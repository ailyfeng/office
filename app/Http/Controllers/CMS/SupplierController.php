<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Supplier;
use App\Http\Models\SupplierContact;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;


/**
 * 公司产品供应商
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @version V.D.1.0
 */
class SupplierController extends CMSController
{

    /**
     * 查询公司产品供应商
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

        return view('cms.supplier.index',compact(
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
     * ajax 查找供应商检查
     *
     * @access public
     * @static funciton
     */
    public static function keyword(){

        $query = Input::only('query');
        
        $input = $query['query'];

        $typeTemp = false;
        foreach (self::whereField as $key => $value) {
            if($input['type']==$key){
                $typeTemp = $key;
                break;
            }
        }

        $type = empty($typeTemp)?'fullName':$typeTemp;


        $res  = Supplier::select($type)->
                        where($type,'regexp',$input['keyword'])->get()->toArray();
        $data = array();
        foreach( $res as $list){
            $data[]=['fullName'=>$list[$type]];
        }
        echo json_encode($data);
    }

    /**
     * 添加公司产品供应商
     *
     * @access public
     * @static funciton
     */
    public static function create(){

        $isBoolean = Supplier::isBoolean();
        $type = Supplier::type();

        return view('cms.supplier.create',compact('isBoolean','type'));
    }

    /**
     * 根据供应商ID编辑该供应商
     *
     * @param Integer $supplierId  产品ID
     */
    public static function edit($supplierId){

        $data = Supplier::find($supplierId);
        $isBoolean = Supplier::isBoolean();
        $type = Supplier::type();

        $data->type = json_decode(unserialize($data->type),true);

        return view('cms.supplier.edit',compact('data','isBoolean','type'));
    }

    /**
     * 供应商入库
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
                
                $res = Supplier::create($validator['input']);

                if($res){
                    
                    return redirect('cms/supplier');
                
                }else{

                    return back()->with('errors','数据填充失败！请稍后重试');
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
            $input['contractDate'] = strtotime($input['contractDate']);
            $input['type'] = serialize(json_encode($input['type']));
            $rules = [
                'fullName'=>'required|min:5|max:100',
                'abbreviation'=>'min:2|max:30',
                'brand'=>'required|min:2|max:30',
                'brand'=>'required|min:2|max:30',
                'brandType'=>'required|min:2|max:30',
                'officeAdd'=>'required|min:5|max:100',
                'warehoustAdd'=>'required|min:5|max:100',
                'area'=>'required|min:2|max:30',
                'settlementMmethod'=>'min:2|max:30',
                'paymentMethod'=>'min:2|max:30',
                'priceTax' => 'numeric',
                'priceNoTax' => 'numeric',
                'credit'=>'min:2|max:30',
            ];

            $message = [
                'fullName.required'=>'请填写供应商全称',
                'fullName.min'=>'供应商全称最少5个字符',
                'fullName.max'=>'供应商全称最多100个字符',

                // 'abbreviation.required'=>'请填写供应商简称',
                'abbreviation.min'=>'供应商简称最少2个字符',
                'abbreviation.max'=>'供应商简称最多30个字符',

                'brand.required'=>'请填写供应品牌',
                'brand.min'=>'供应品牌最少2个字符',
                'brand.max'=>'供应品牌最多30个字符',

                'brandType.required'=>'请填写供应品类',
                'brandType.min'=>'供应品类最少2个字符',
                'brandType.max'=>'供应品类最多30个字符',

                'officeAdd.required'=>'请填写办公地址',
                'officeAdd.min'=>'办公地址最少5个字符',
                'officeAdd.max'=>'办公地址最多100个字符',

                'warehoustAdd.required'=>'请填写库房地址',
                'warehoustAdd.min'=>'库房地址最少5个字符',
                'warehoustAdd.max'=>'库房地址最多100个字符',

                'area.required'=>'请填写采购区域',
                'area.min'=>'采购区域最少2个字符',
                'area.max'=>'采购区域最多30个字符',

                'settlementMmethod.required'=>'请填写结算方式',
                'settlementMmethod.min'=>'结算方式最少2个字符',
                'settlementMmethod.max'=>'结算方式最多30个字符',

                // 'paymentMethod.required'=>'请填写收款方式',
                'paymentMethod.min'=>'收款方式最少2个字符',
                'paymentMethod.max'=>'收款方式最多30个字符',

                // 'priceTax.required' => '请填写结算价格（含税）',
                'priceTax.numeric' => '结算价格（含税）有误',

                // 'priceNoTax.required' => '请填写结算价格（不含税）',
                'priceNoTax.numeric' => '结算价格（不含税）有误',

                // 'credit.required'=>'请填写授信额度',
                'credit.min'=>'授信额度最少2个字符',
                'credit.max'=>'授信额度最多30个字符',
            ];


            $validator = Validator::make($input,$rules,$message);

            $data = array('input'=>$input,'validator'=>$validator);

            return $data;

    }
    /**
     * 更新供应商
     *
     * <p>此接口地址：post.cms/supplier/{$supplierId}</p>
     * @param Integer $productId  产品ID
     * @todo 没有判断错误
     */
    public static function update($supplierId){

        $input = Input::except("_token",'_method');


        //验证数据
        $validatorData = self::validatorData($input);
  

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
     * 删除供应商
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

    /**
     * 添加供应商联系人
     *
     * @access  public
     * @static  Function 
     * @param   Integer $id 供应商ID
     */
    public static function contractCreate($id=false){
        
        $id = intval($id);

        if($id>0){


        }

        $isBoolean = Supplier::isBoolean();

        $data = Supplier::find($id,['fullName']);


        return view('cms.supplier.contract_reate',compact('data','isBoolean'));
    }


}
