<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Supplier;
use App\Http\Models\SupplierContact;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;


/**
 * 公司产品供应商联系方式
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @version V.D.1.0
 */
class SupplierContractController extends CMSController
{

    /**
     * 查询公司产品供应商联系人
     */
    public static function index(){


        //产品选择供应商时要用到一下参数
        $selectSupplier = Input::get('selectSupplier')=='selectSupplier'?true:false;

        $id = Input::get('id');
        
        $name = Input::get('name');

 

        $whereField    = [
                            'fullName'      =>['field'=>'fullName',     'value'=>false, 'name'=>'供应商'      ,'sortUrl'=>false],
                            'name'          =>['field'=>'name' ,        'value'=>false, 'name'=>'姓名'        ,'sortUrl'=>false],
                            'nickname'      =>['field'=>'nickname' ,    'value'=>false, 'name'=>'英文名/昵称'  ,'sortUrl'=>false],
                            'gender'        =>['field'=>'gender',       'value'=>false, 'name'=>'性别'        ,'sortUrl'=>false],
                            'position'      =>['field'=>'position',     'value'=>false, 'name'=>'职位/描述'    ,'sortUrl'=>false],
                            'age'           =>['field'=>'age',          'value'=>false, 'name'=>'年龄'        ,'sortUrl'=>false],
                            'telOne'        =>['field'=>'telOne',       'value'=>false, 'name'=>'手机号'      ,'sortUrl'=>false]
                        ];

        $input = Input::except('_token');

        $SupplierContact = new SupplierContact();
        $Supplier = new Supplier();

        $filterWhere = self::filterWhere(
                                        $input,
                                        $whereField,
                                        $SupplierContact->table,
                                        $Supplier->table,
                                        array('fullName'),
                                        $SupplierContact->table. '.supplierId',
                                        'cms/supplierContract');

        $where          = $filterWhere['where'];
        $pageParam      =  $filterWhere['pageParam'];
        $orderby        =  $filterWhere['orderby'];
        $orderbyCurr    =  $filterWhere['orderbyCurr'];
        $whereField     =  $filterWhere['whereField'];

// dd($whereField);

        $data = array();

        if($where || $orderby){//筛选查找

   
                $data = $SupplierContact->select([
                                        $SupplierContact->table .'.*',
                                        $Supplier->table .'.fullName as fullName',
                                        $Supplier->table .'.close as supplierClose'
                                        ])
                            ->join($Supplier->table, $SupplierContact->table .'.supplierId', "=", $Supplier->table .'.supplierId')
                            ->where($where)

                            ->orderBy($orderby[0]['field'], $orderby[0]['sort'])
                            ->orderBy($orderby[1]['field'], $orderby[1]['sort'])
                            ->orderBy($orderby[2]['field'], $orderby[2]['sort'])
                            ->orderBy($orderby[3]['field'], $orderby[3]['sort'])
                            ->orderBy($orderby[4]['field'], $orderby[4]['sort'])
                            ->orderBy($orderby[5]['field'], $orderby[5]['sort'])
                            ->orderBy($orderby[6]['field'], $orderby[6]['sort'])
                            ->orderBy($orderby[7]['field'], $orderby[7]['sort'])
                            ->paginate(15);



        }else{//没有任何查找条件

            $data = $SupplierContact->select([
                                        $SupplierContact->table .'.*',
                                        $Supplier->table .'.fullName as fullName',
                                        $Supplier->table .'.close as supplierClose'
                                    ])->join($Supplier->table, function ($join){ 

                               $join->on($SupplierContact->table .'.supplierId', "=", $Supplier->table .'.supplierId');

                             })->orderBy($SupplierContact->table .'.supplierId','asc')->paginate(15);



        }

        $isBoolean = SupplierContact::isBoolean();

        foreach ($data as &$list) {
            $list->gender = SupplierContact::isGender($list->gender);//过滤性别
        }


        //添加分页时的参数
        if($data){
            $data->appends($pageParam);
        }


        return view('cms.supplierContract.index',compact('data','selectSupplier','id','name','whereField','orderbyCurr'));
    
    }

    /**
     * 添加供应商联系人
     *
     * @access public
     * @param Integer $supplierId  供应商ID
     * @static funciton
     */
    public static function create($supplierId){

        $data = Supplier::select(array('supplierId','fullName'))->find($supplierId);
        if($data){
            
            $data = $data->toArray();

        }else{
            $data = array('supplierId'=>null,'fullName'=>null);
        }

        $isGender = SupplierContact::isGender();

        return view('cms.supplierContract.create',compact('isGender','data'));
    }

    /**
     * 编辑供应商联系人ID
     *
     * @param Integer $supplierId  产品ID
     */
    public static function edit($contactId){

        $data = SupplierContact::find($contactId);

        if($data){
            
            $data->birthday = !empty($data->birthday)?date('Y-m-d',$data->birthday):null;
            $supplierData = Supplier::find($data->supplierId); 

        }else{

                return redirect(url('cms/alert',array('mes'=>'供应商联系人不存在！','url'=>urlencode(url('cms/supplierContract')))));

        }

        $isGender = SupplierContact::isGender();

        return view('cms.supplierContract.edit',compact('data','isGender','supplierData'));
    }

    /**
     * 供应商入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确
     * @access public
     * @static Function
     */
    public static function store(){

        $input = Input::except(array("_token","supplierId_"));

        if($input){

            $validator = self::validatorData($input);

            if($validator['validator']->passes() ===true){
                
                $res = SupplierContact::create($validator['input']);

                if($res){ 
                    
                   return redirect(url('cms/alert',array('mes'=>'保存成功，可以继续添加联系人','url'=>urlencode(url('cms/supplierContract/create/'.$input['supplierId'])))));

                
                }else{

                    return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/supplierContract/create/'.$input['supplierId'])))));

                }
            }else{

                return back()->withErrors($validator['validator']);

            }
        }
    }

    /**
     *  验证供应商入库时的参数
     *  
     *  @param Array $input 供应商入库时的参数
     *  @static Function
     *  @return Array | false
     */
    public static function validatorData($input){

        if(!is_array($input)){
            return false;
        }

            $input['birthday'] = strlen($input['birthday'])>5?strtotime($input['birthday']):0;
            // dd($input);
            $rules = [
                'name'=>'required|min:2|max:30',
                // 'nickname'=>'min:2|max:30',
                // 'position'=>'max:250',
                // 'age'=>'numeric|max:3',
                // 'phone'=>'numeric|min:6|max:11',
                // 'telOne'=>'numeric|min:11|max:11',
                // 'telTwo'=>'numeric|min:11|max:11',
                // 'email'=>'email',
                // 'qq' => 'numeric|min:4|max:11',
                // 'wechat'=>'min:3|max:20',
                // 'account'=>'min:5|max:40',
                // 'birthday' => 'numeric',
                // 'note'=>'max:250'
            ];

            $message = [
                'name.required'=>'请填写姓名',
                'name.min'=>'姓名最少2个字符',
                'name.max'=>'姓名最多30个字符',

                // 'nickname.min'=>'英文名/昵称最少2个字符',
                // 'nickname.max'=>'英文名/昵称最多30个字符',

                // 'position.max'=>'职位/描述最大为250位',


                // 'age.numeric'=>'年龄有误',
                // 'age.max'=>'年龄有误1',

                // 'phone.numeric'=>'座机电话有误',
                // 'phone.min'=>'座机电话最少6位字符',
                // 'phone.max'=>'座机电话最多11位字符',

                // 'phoneExt.numeric'=>'分机有误',
                // 'phoneExt.min'=>'分机有误最少1位字符',
                // 'phoneExt.max'=>'分机有误最多11位字符',

                // 'telOne.numeric'=>'手机一有误',
                // 'telOne.min'=>'手机一有误',
                // 'telOne.max'=>'手机一有误',


                // 'telTwo.numeric'=>'手机二有误',
                // 'telTwo.min'=>'手机二有误',
                // 'telTwo.max'=>'手机二有误',


                // 'email.email'=>'邮箱不正确',

                // 'qq.numeric'=>'QQ必须是数字',
                // 'qq.min'=>'QQ最少2个字符',
                // 'qq.max'=>'QQ最多11个字符',

                // 'wechat.min'=>'微信最少5个字符',
                // 'wechat.max'=>'微信最多40个字符',

                // 'account.min'=>'个人帐户最少5个字符',
                // 'account.max'=>'个人帐户最多40个字符',

                // 'birthday.numeric' => '生日有误',
                // 'note.max'=>'附注最多250个字符'
            ];


            $validator = Validator::make($input,$rules,$message);

            $data = array('input'=>$input,'validator'=>$validator);
// dd($data);
            return $data;

    }
    /**
     * 更新供应商联系人
     *
     * <p>此接口地址：post.cms/supplier/{$supplierId}</p>
     * @param Integer $productId  产品ID
     * @todo 没有判断错误
     */
    public static function update($contactId){

        $input = Input::except('_token','_method','supplierId_');


        //验证数据
        $validatorData = self::validatorData($input);
  

        if($validatorData['validator']->passes()===true){

            $res = SupplierContact::where('contactId',$contactId)->update($validatorData['input']);

            if($res){

                return redirect(url('cms/alert',array('mes'=>'保存成功','url'=>urlencode(url('cms/supplierContract/'.$contactId.'/edit')))));

            }else{

                return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/supplierContract/'.$contactId.'/edit')))));

            }

        }else{
                return back()->withErrors($validatorData['validator']);

        }
    }


    /**
     * 删除该产品
     *
     * <p> delete.cms/product/{$contactId}</p>
     * @param Array | Int $supplierId 供应商联系人ID
     * @todo 没有判断ID是否存在
     * @return json
     */
    public static function destroy($contactId){


        $input = Input::only("status");

        $status = intval($input['status']);

        $ids = explode(',', $contactId);

        if(count($ids)>1){// 批量操作
            
            foreach ($ids as $k => $id) {
                
                $id =intval($id); 

                if($k==0){
                    $resQuery = SupplierContact::where('contactId',$id);
                }else{
                    $resQuery->orWhere('contactId',$id);
                }
            }
 
            $res = $resQuery->update(['close'=>$status]);
            
        }else{

            $res = SupplierContact::where("contactId",$contactId)->update(['close'=>$status]);
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
