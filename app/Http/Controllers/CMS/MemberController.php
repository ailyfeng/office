<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Members;
use App\Http\Models\Supplier;
use App\Http\Models\SupplierContact;
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
                            'fullName'      =>['field'=>'fullName',       'value'=>false,   'name'=>'供应商全称'   ,'sortUrl'=>false],
                            'abbreviation'  =>['field'=>'abbreviation',   'value'=>false,   'name'=>'供应商简称'   ,'sortUrl'=>false],
                            'brandType'     =>['field'=>'brandType',       'value'=>false,   'name'=>'供应品类'    ,'sortUrl'=>false],
                            'credit'        =>['field'=>'credit',          'value'=>false,   'name'=>'授信额度'    ,'sortUrl'=>false],
                            'brand'         =>['field'=>'brand',           'value'=>false,     'name'=>'品牌'     ,'sortUrl'=>false]
                        ];

        $input = Input::except("_token");
        $Supplier = new Supplier();
        $filterWhere = self::filterWhere(
                                        $input,
                                        $whereField,
                                        $Supplier->table,
                                        null,
                                        array(),
                                        $Supplier->table.'.supplierId',
                                        'cms/supplier'
                                        );

        $where          = $filterWhere['where'];
        $pageParam      =  $filterWhere['pageParam'];
        $orderby        =  $filterWhere['orderby'];
        $orderbyCurr    =  $filterWhere['orderbyCurr'];
        $whereField     =  $filterWhere['whereField'];

        $sonId          = $filterWhere['sonId'];
        $sonName        = $filterWhere['sonName'];
        $selectSupplier = $filterWhere['selectSupplier'];


        $isBoolean = Supplier::isBoolean();

        if(!empty($where) || !empty($orderby)){
            $Supplier = Supplier::where($where);

            foreach ($orderby as $o) {
                $Supplier->orderBy($o['field'],$o['sort']);
            }

            $data = $Supplier->paginate(15);

        }else{

            $data = Supplier::orderBy('supplierId','desc')->paginate(15);
        
        }


       $data->appends($pageParam);

        return view('cms.member.index',compact(
                                                'data',
                                                'isBoolean',
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

        $isBoolean = Supplier::isBoolean();
        $employType           = Members::employType();
        $departmentId   = Members::departmentId();
        $level          = Members::level();
        $sex            = Members::sex();
        $checkLevel     = Members::checkLevel();

        return view('cms.member.create',compact('isBoolean','employType','departmentId','level','sex','checkLevel'));
    }

    /**
     * 根据员工ID编辑该员工
     *
     * @param Integer $supplierId  产品ID
     */
    public static function edit($supplierId){

        $data = Supplier::find($supplierId);
        $isBoolean = Supplier::isBoolean();
        $type = Supplier::type();

        $data->type = json_decode(unserialize($data->type),true);

        return view('cms.member.edit',compact('data','isBoolean','type'));
    }

    /**
     * 员工数据入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确
     * @access public
     * @static Function
     */
    public static function store(){

        $input = Input::except("_token");

        if($input){

            $validator = self::validatorData($input);

            if($validator['validator']->passes() ===true){
                
                $res = Members::create($validator['input']);

                if($res){
                    dd($res);
                    return redirect('cms/member');
                
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
     * <p>此接口地址：post.cms/supplier/{$supplierId}</p>
     * @param Integer $productId  产品ID
     * @todo 没有判断错误
     */
    public static function update($supplierId){

        $input = Input::except("_token",'_method');

        //验证数据
        $validatorData = self::validatorData($input);
        // dd($validatorData['input']['contractDate']);
        if($tmpContractDate = Supplier::select('contractDate')->find($supplierId)){
            if($tmpContractDate->contractDate<$validatorData['input']['contractDate']){
                return redirect(url('cms/alert',array('mes'=>'该供应商合同已经到期，不能改动！','url'=>urlencode(url('cms/supplier/'.$supplierId.'/edit')))));
            }
        }

        if($validatorData['validator']->passes()===true){

            $res = Supplier::where('supplierId',$supplierId)->update($validatorData['input']);

            if($res){

                return redirect(url('cms/alert',array('mes'=>'保存成功')));

            }else{

                return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/supplier/'.$supplierId.'/edit')))));

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
                    $resQuery = Supplier::where('supplierId',$id);
                }else{
                    $resQuery->orWhere('supplierId',$id);
                }
            }
 
            $res = $resQuery->update(['close'=>$status]);
            
        }else{

            $res = Supplier::where("supplierId",$supplierId)->update(['close'=>$status]);
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
