<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Models\ClientMember\ClientMember;
use Illuminate\Support\Facades\Input;
use Validator;

/**
 * Class ClientMember
 * @package App\Http\Controllers\CMS
 */
class ClientMemberController extends CMSController
{
    //

    public static function index(){

        $whereField    = [
            'nameChinese'   =>['field'=>'nameChinese',     'value'=>false,   'name'=>'姓名'       ,'sortUrl'=>false],
            'nameEnglish'   =>['field'=>'nameEnglish',     'value'=>false,   'name'=>'英文名/昵称' ,'sortUrl'=>false],
            'sex'           =>['field'=>'sex',             'value'=>false,   'name'=>'性别'       ,'sortUrl'=>false],
            'bargainNum'    =>['field'=>'bargainNum',       'value'=>false,   'name'=>'交易次数'    ,'sortUrl'=>false],
            'telOne'        =>['field'=>'telOne',           'value'=>false,   'name'=>'电话号码'    ,'sortUrl'=>false]
        ];

        $input = Input::except("_token");
        $Members = new ClientMember();
        $filterWhere = self::filterWhere(
            $input,
            $whereField,
            $Members->table,
            null,
            array(),
            $Members->table.'.id',
            'cms/clientMember'
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
            $Members = ClientMember::where($where);

            foreach ($orderby as $o) {
                $Members->orderBy($o['field'],$o['sort']);
            }

            $data = $Members->paginate(15);

        }else{

            $data = ClientMember::orderBy('id','desc')->paginate(15);

        }
//        dd($data);
        $sexArr = ClientMember::sexList();
        foreach ($data as &$list){
            $list->sex = $sexArr[$list->sex];
        }

        $data->appends($pageParam);

        return view('cms.clientMember.index',compact(
                'sexArr',
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
     * 根据客户ID编辑
     *
     * @param Integer $supplierId  产品ID
     */
    public static function edit($id){

        $data = ClientMember::find($id);
        if(!$data){
            return back()->with('errors','数据不存在！');
        }
        $data->brithday = date('Y-m-d',$data->brithday);


        $sexList            = ClientMember::sexList();

        return view('cms.clientMember.edit',compact('data','sexList'));
    }

    /**
     * 创建数据
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function create(){


        $sexList = ClientMember::sexList();

        return view('cms.clientMember.create',compact('sexList'));
    }

    /**
     * 员工数据入库
     *
     * @access public
     * @static Function
     */
    public static function store(){

        $input = Input::except("_token");
//dd($input);
        if($input){

            $validator = self::validatorData($input);

            if($validator['validator']->passes() ===true){

                $res = ClientMember::create($validator['input']);

                if($res){
                    return redirect(url('cms/alert',array('mes'=>'保存成功','url'=>urlencode(url('cms/clientMember')))));
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }

            }else{

                return back()->withErrors($validator['validator']);

            }
        }
    }

    /**
     *  验证客户信息的参数
     *
     *  @param Array $input 客户信息入库时的参数
     *  @static Function
     *  @return Array | false
     */
    public static function validatorData($input){

        if(!is_array($input)){
            return false;
        }
        $input['brithday'] = strtotime($input['brithday']);

        $rules = [
                'nameChinese'=>'required|max:30'
        ];

        $message = [
                'nameChinese.required'=>'请填写供应商全称',
                'nameChinese.max'=>'供应商全称最多30个字符',

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
    public static function update($id){

        $input = Input::except("_token",'_method','leadId_');

        //验证数据
        $validatorData = self::validatorData($input);

        if($validatorData['validator']->passes()===true){

            $res = ClientMember::find($id)->update($validatorData['input']);

            if($res){
                return redirect(url('cms/alert',array('mes'=>'更新成功！','url'=>urlencode(url('cms/clientMember/'.$id.'/edit')))));
            }else{
                return redirect(url('cms/alert',array('mes'=>'更新失败！','url'=>urlencode(url('cms/clientMember/'.$id.'/edit')))));
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
    public static function destroy($clientId){

        $input = Input::only("status");

        $status = intval($input['status']);


        $ids = explode(',', $clientId);

        if(count($ids)>1){// 批量操作

            foreach ($ids as $k => $id) {

                $id =intval($id);

                if($k==0){
                    $resQuery = ClientMember::where('id',$id);
                }else{
                    $resQuery->orWhere('id',$id);
                }
            }

            $res = $resQuery->update(['close'=>$status]);

        }else{

            $res = ClientMember::where("id",$clientId)->update(['close'=>$status]);
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
