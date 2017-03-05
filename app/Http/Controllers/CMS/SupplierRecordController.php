<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Product;
use App\Http\Models\WarehouseProduct;
use App\Http\Models\Warehouse;
use App\Http\Models\Classify;


use App\Http\Models\Supplier;
use App\Http\Models\SupplierRecord;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;


/**
 * 供应商接触记录
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @version V.D.1.0
 */
class SupplierRecordController extends CMSController
{



    /**
     * 查询库房产品管理
     * 
     * @todo 如果没有数据会报错
     */
    public static function index(){
            
        $Supplier    = new Supplier();
        $SupplierRecord = new SupplierRecord();

        $whereField    = [
                            //公司产品
                            $Supplier->table=>[
                                'fullName'  	=>['value'=>false,   'name'=>'供应商全称'     ,'sortUrl'=>false]
                            ],
                            //库房产品
                            $SupplierRecord->table=>[
                                'id'            =>false,
                                'close'         =>false,
                                'type'          =>['value'=>false,  'name'=>'联系方式',      'sortUrl'=>false],
                                'postion'       =>['value'=>false,  'name'=>'库存位置',      'sortUrl'=>false],
                                'minNum'        =>['value'=>false,  'name'=>'最低库存量',    'sortUrl'=>false],
                                'maxNum'        =>['value'=>false,  'name'=>'最高库存量',    'sortUrl'=>false],
                                'cycle'         =>['value'=>false,  'name'=>'盘点周期',      'sortUrl'=>false]
                            ]


                        ];

        $input = Input::except("_token");
        $filterWhere = self::filterWhereExt(
                                        $input,
                                        $whereField,
                                        $SupplierRecord->table.'.warehouseId',
                                        'cms/warehouseProduct'
                                        );

        // dd($filterWhere);

        $select          = $filterWhere['select'];
        $where          = $filterWhere['where'];
        $pageParam      =  $filterWhere['pageParam'];
        $orderby        =  $filterWhere['orderby'];
        $orderbyCurr    =  $filterWhere['orderbyCurr'];
        $whereField     =  $filterWhere['whereField'];

        $sonId          = $filterWhere['sonId'];
        $sonName        = $filterWhere['sonName'];
        $selectSupplier = $filterWhere['selectSupplier'];

// dd($whereField);
        $data = array();

        if($where || $orderby){//筛选查找

            $data = $SupplierRecord->select($select)
                        ->join($Supplier->table, $Supplier->table .'.supplierId', "=", $SupplierRecord->table .'.supplierId')
                        // ->join($Product->table, $Product->table .'.productId', "=", $WarehouseProduct->table .'.productId')
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

            $data = $SupplierRecord->select($select)
                        ->join($Supplier->table, $Supplier->table .'.supplierId', "=", $SupplierRecord->table .'.supplierId')
                        ->orderBy($SupplierRecord->table.'.warehouseId', 'asc')
                        ->paginate(15);
        }

        $Warehouse_product_type = SupplierRecord::type();
        $product_typeTmp    =  Classify::where('type','=',1)->get();

        foreach ($product_typeTmp as $list) {
            # code...
            $product_type[$list['id']] = $list['name'];
        }

        //库房产品类型
        foreach ($data as $key => &$list) {
            # code...
            $list['warehouse_product_type']=isset($Warehouse_product_type[$list['warehouse_product_type']])?$Warehouse_product_type[$list['warehouse_product_type']]:false;
            $list['product_type']=isset($product_type[$list['product_type']])?$product_type[$list['product_type']]:false;
        }
// dd($data);
        //添加分页时的参数
        if($data){
            $data->appends($pageParam);
        }

// dd($whereField);
        return view('cms.SupplierRecord.index',compact(
                                                    'data',
                                                    'selectSupplier',
                                                    'sonId',
                                                    'sonName',
                                                    'whereField',
                                                    'product_type',
                                                    'orderbyCurr',
                                                    'Warehouse_product_type'
                                                    )
                    );

    }


    /**
     * 添加库房产品管理
     *
     * @access public
     * @static funciton
     */
    public static function create($id=null){

        $supplierRecord = SupplierRecord::find($id);
		$supplierRecord['timestamp'] = date('Y-m-d',time());
        $type = SupplierRecord::type();

        return view('cms.SupplierRecord.create',compact('supplierRecord','type'));
    }

    /**
     * 根据供应商ID编辑该供应商
     *
     * @param Integer $supplierId  产品ID
     */
    public static function edit($id){

        $data = WarehouseProduct::find($id);
        if($data){
            $warehouse = Warehouse::select('name')->find($data->warehouseId);
            $data->name = $warehouse->name;
            $product = Product::select('chineseBrand')->find($data->productId);
            $data->productName = $product->chineseBrand;
        }

        $type = WarehouseProduct::type();
// dd($data);
        // $data->type = json_decode(unserialize($data->type),true);

        return view('cms.SupplierRecord.edit',compact('data','type'));
    }

    /**
     * 供应商入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确
     * @access public
     * @static Function
     * @todo 供应商在没有选择的情况下，没有提示（bug）
     */
    public static function store(){

        $input = Input::except(array("_token",'supplierId_','memberId_'));

        if($input){

            $validator = self::validatorData($input);

            if($validator['validator']->passes() ===true){
                
// dd($input);

                $res = SupplierRecord::create($validator['input']);

                if($res){
                    
                    return redirect('cms/supplierRecord');
                
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
    public static function validatorData($input,$id=false){
        if(!is_array($input)){
            return false;
        }
        
        $input['supplierId'] = intval($input['supplierId']);
        $input['memberId'] = intval($input['memberId']);
        $input['type']=intval($input['type']);
        $input['timestamp']=strtotime($input['timestamp']);
        $input['nextTimestamp']=strlen($input['nextTimestamp'])>7?strtotime($input['nextTimestamp']):null;

        $rules = [
            'supplierId' => 'numeric',
            'memberId' => 'numeric'

        ];

        $message = [

            'supplierId.numeric' => '请选择供应商',
            'memberId.numeric' => '请选择联系人'

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
    public static function update($id){

        $input = Input::except(array("_token",'warehouseId_','productId_','_method'));


        //验证数据
        $validatorData = self::validatorData($input,$id);
  

        if($validatorData['validator']->passes()===true){

            $res = warehouseProduct::where('id',$id)->update($validatorData['input']);

            if($res){

                return redirect(url('cms/alert',array('mes'=>'保存成功')));

            }else{

                return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/warehouseProduct/'.$id.'/edit')))));

            }

        }else{
                return back()->withErrors($validatorData['validator']);

        }
    }

    /**
     * 删除供应商
     *
     * <p> delete.cms/supplier/{$paramId}</p>
     * @param Integer | String $paramId 公司产品ID
     * @todo 没有判断ID是否存在
     * @return json
     */
    public static function destroy($paramId){

        $input = Input::only("status");

        $status = intval($input['status']);


        $ids = explode(',', $paramId);

        if(count($ids)>1){// 批量操作
            
            foreach ($ids as $k => $id) {
                
                $id =intval($id); 

                if($k==0){
                    $resQuery = warehouseProduct::where('id',$id);
                }else{
                    $resQuery->orWhere('id',$id);
                }
            }
 
            $res = $resQuery->update(['close'=>$status]);
            
        }else{

            $res = warehouseProduct::where("id",$paramId)->update(['close'=>$status]);
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


        return view('cms.SupplierRecord.contract_reate',compact('data','isBoolean'));
    }


}
