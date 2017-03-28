<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Members;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;


/**
 * 员工管理
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @version V.D.1.0
 */
class MemberController extends CMSController
{

    /**
     * 查询员工管理
     * 
     * @todo 如果没有数据会报错
     */
    public static function index(){
        $whereField    = [
                            'nameChinese'   =>['field'=>'nameChinese',     'value'=>false,   'name'=>'姓名'       ,'sortUrl'=>false],
                            'sex'           =>['field'=>'sex',             'value'=>false,   'name'=>'性别'       ,'sortUrl'=>false],
                            'departmentId'  =>['field'=>'departmentId',    'value'=>false,   'name'=>'所属部门'    ,'sortUrl'=>false],
                            'employType'    =>['field'=>'employType',      'value'=>false,   'name'=>'雇佣方式'    ,'sortUrl'=>false],
                            'telOne'        =>['field'=>'telOne',          'value'=>false,   'name'=>'手机一'     ,'sortUrl'=>false]
                        ];

        $input = Input::except("_token");
        $Members = new Members();
        $filterWhere = self::filterWhere(
                                        $input,
                                        $whereField,
                                        $Members->table,
                                        null,
                                        array(),
                                        $Members->table.'.memberId',
                                        'cms/member'
                                        );

        $where          = $filterWhere['where'];
        $pageParam      =  $filterWhere['pageParam'];
        $orderby        =  $filterWhere['orderby'];
        $orderbyCurr    =  $filterWhere['orderbyCurr'];
        $whereField     =  $filterWhere['whereField'];

        $sonId          = $filterWhere['sonId'];
        $sonName        = $filterWhere['sonName'];
        $selectSupplier = $filterWhere['selectSupplier'];



        if(!empty($where) || !empty($orderby)){
            $Members = Members::where($where);

            foreach ($orderby as $o) {
                $Members->orderBy($o['field'],$o['sort']);
            }

            $data = $Members->paginate(15);

        }else{

            $data = Members::orderBy('memberId','desc')->paginate(15);
        
        }
//        dd($data);
        $sexArr = Members::sex();
        $employTypeArr = Members::employType();
        $departmentIdArr = Members::departmentId();
        foreach ($data as &$list){
            $list->employType = $employTypeArr[$list->employType];
            $list->departmentId = $departmentIdArr[$list->departmentId];
            $list->sex = $sexArr[$list->sex];
        }

       $data->appends($pageParam);

        return view('cms.member.index',compact(
                                                'sexArr',
                                                'employTypeArr',
                                                'departmentIdArr',
                                                'data',
                                                'selectSupplier',
                                                'sonId',
                                                'sonName',
                                                'whereField',
                                                'orderbyCurr',
                                                'type'
                                                )
        );
    }


    /**
     * 添加员工管理
     *
     * @access public
     * @static funciton
     */
    public static function create(){

        $employType     = Members::employType();
        $departmentId   = Members::departmentId();
        $level          = Members::level();
        $sex            = Members::sex();
        $checkLevel     = Members::checkLevel();

        return view('cms.member.create',compact('employType','departmentId','level','sex','checkLevel'));
    }

    /**
     * 根据员工ID编辑该员工
     *
     * @param Integer $supplierId  产品ID
     */
    public static function edit($memberId){

        $data = Members::find($memberId);
        if(!$data){
            return back()->with('errors','数据不存在！');
        }
        $data->employeeDate = date('Y-m-d',$data->employeeDate);
        $data->staffDate = date('Y-m-d',$data->staffDate);
        $data->leaveData = date('Y-m-d',$data->leaveData);
        $data->brithday = date('Y-m-d',$data->brithday);
        $leadRes = Members::select('nameChinese')->find($data->leadId);
        if(!empty($leadRes)){
            $leadRes = $leadRes->toArray();
            $data->leadId_  = $leadRes['nameChinese'];
        }else{
            $data->leadId_  = null;
        }


        $employType     = Members::employType();
        $departmentId   = Members::departmentId();
        $level          = Members::level();
        $sex            = Members::sex();
        $checkLevel     = Members::checkLevel();

        return view('cms.member.edit',compact('data','employType','departmentId','level','sex','checkLevel'));
    }

    /**
     * 员工数据入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确
     * @access public
     * @static Function
     */
    public static function store(){

        $input = Input::except("_token",'leadId_');

        if($input){

            $validator = self::validatorData($input);

            if($validator['validator']->passes() ===true){
                
                $res = Members::create($validator['input']);

                if($res){
                    return redirect(url('cms/alert',array('mes'=>'保存成功','url'=>urlencode(url('cms/member')))));
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }

            }else{

                return back()->withErrors($validator['validator']);

            }
        }
    }

    /**
     *  验证员工信息的参数
     *  
     *  @param Array $input 员工信息入库时的参数
     *  @static Function
     *  @return Array | false
     */
    public static function validatorData($input){

        if(!is_array($input)){
            return false;
        }
        $input['brithday'] = strtotime($input['brithday']);
        $input['employeeDate'] = strtotime($input['employeeDate']);
        $input['staffDate'] = strtotime($input['staffDate']);
        $input['leaveData'] = strtotime($input['leaveData']);

            $rules = [
//                'fullName'=>'required|min:1|max:100'
            ];

            $message = [
//                'fullName.required'=>'请填写供应商全称',
//                'fullName.min'=>'供应商全称最少1个字符',
//                'fullName.max'=>'供应商全称最多100个字符',

            ];


            $validator = Validator::make($input,$rules,$message);

            $data = array('input'=>$input,'validator'=>$validator);

            return $data;

    }

    /**
     * 更新员工信息
     *
     * <p>此接口地址：post.cms/member/{$memberId}</p>
     * @param Integer $memberId  用户ID
     * @todo 没有判断错误
     */
    public static function update($memberId){

        $input = Input::except("_token",'_method','leadId_');

        //验证数据
        $validatorData = self::validatorData($input);

        if($validatorData['validator']->passes()===true){

            $res = Members::where('memberId',$memberId)->update($validatorData['input']);

            if($res){
                return redirect(url('cms/alert',array('mes'=>'更新成功！','url'=>urlencode(url('cms/member/'.$memberId.'/edit')))));
            }else{
                return redirect(url('cms/alert',array('mes'=>'更新失败！','url'=>urlencode(url('cms/member/'.$memberId.'/edit')))));
            }


        }else{

                return back()->withErrors($validatorData['validator']);

        }
    }

    /**
     * 删除员工信息
     *
     * <p> delete.cms/supplier/{$supplierId}</p>
     * @param Integer | String $supplierId 公司产品ID
     * @todo 没有判断ID是否存在
     * @return json
     */
    public static function destroy($supplierId){

        $input = Input::only("status");

        $status = intval($input['status']);


        $ids = explode(',', $supplierId);

        if(count($ids)>1){// 批量操作
            
            foreach ($ids as $k => $id) {
                
                $id =intval($id); 

                if($k==0){
                    $resQuery = Members::where('memberid',$id);
                }else{
                    $resQuery->orWhere('memberid',$id);
                }
            }
 
            $res = $resQuery->update(['close'=>$status]);
            
        }else{

            $res = Members::where("memberid",$supplierId)->update(['close'=>$status]);
        }


        if($res){
            $data = [
                'status'=>1,
                'msg'=>$status?'已经停用':'开启使用'
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'操作失败！请稍后重试',
            ];

        }
        return $data;
    }


}
