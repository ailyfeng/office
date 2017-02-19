<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Classify;
use App\Http\Models\Supplier;
use App\Http\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;
use Symfony\Component\Routing\Route;

/**
 * 公司产品
 *
 * @copyright   成都欧飞仕科技贸易有限公司
 * @author      Kenn
 * @version     V.d.0.1
 */
class ProductController extends CMSController
{

    /**
     * 要查找的默认字段
     *
     * @count  defaultField
     */
    const defaultField  = 'chineseBrand';


    /**
     * 查询产品
     *
     * @access private
     * @static function
     */
    public static function index(){


        $whereField    = [
                            'sort'          =>['field'=>'sort',           'value'=>false, 'name'=>'产品分类'    ,'sortUrl'=>false],
                            'chineseBrand'  =>['field'=>'chineseBrand' ,  'value'=>false, 'name'=>'中文品牌'    ,'sortUrl'=>false],
                            'englishBrand'  =>['field'=>'englishBrand' ,  'value'=>false, 'name'=>'英文品牌'    ,'sortUrl'=>false],
                            'number'        =>['field'=>'number',         'value'=>false, 'name'=>'货号'       ,'sortUrl'=>false],
                            'brandName'     =>['field'=>'brandName',      'value'=>false, 'name'=>'品名'       ,'sortUrl'=>false],
                            'standard'      =>['field'=>'standard',       'value'=>false, 'name'=>'规格'       ,'sortUrl'=>false],
                            'color'         =>['field'=>'color',          'value'=>false, 'name'=>'颜色'       ,'sortUrl'=>false]
                        ];

        $input = Input::except('_token');

        $Product = new Product();
        $Classify = new Classify();

        $filterWhere = self::filterWhere(
                                        $input,
                                        $whereField,
                                        $Product->table,
                                        $Classify->table,
                                        array('sort'),
                                        $Product->table.'.type',
                                        'cms/product'
                                        );

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

   
                $data = $Product->select([
                                        $Product->table .'.*',
                                        $Classify->table .'.name as name',
                                        $Classify->table .'.id as id',
                                        $Classify->table .'.close as classifyClose',
                                        $Classify->table .'.sort as sort'
                                        ])
                            ->join($Classify->table, $Product->table .'.type', "=", $Classify->table .'.id')
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

            $data = $Product->select([
                                        $Product->table .'.*',
                                        $Classify->table .'.name as name',
                                        $Classify->table .'.id as id',
                                        $Classify->table .'.close as classifyClose',
                                        $Classify->table .'.sort as sort'
                                    ])->join($Classify->table, function ($join){ 

                               $join->on($Product->table .'.type', "=", $Classify->table .'.id');

                             })->orderBy($Product->table .'.type','asc')->paginate(15);



        }


        
        //公司产品分类名称
        $type = self::classify();
    
        foreach ($data  as &$list) {

            if(strrpos($list->sort, '-')){
            
                $list->parentName = $type[substr($list->sort,0,abs(strrpos($list->sort,'-')))]->name;
            
            }elseif(is_numeric($list->sort)){

                $list->parentName = $type[$list->sort]->name;

            }else{
            
                $list->parentName = $type[$list->sort]->name;
            
            }
        } 
        //添加分页时的参数
        if($data){
            $data->appends($pageParam);
        }

        return view('cms.product.index',compact(
                                                    'data',
                                                    'selectSupplier',
                                                    'sonId',
                                                    'sonName',
                                                    'whereField',
                                                    'type',
                                                    'orderbyCurr'
                                                    )
                    );
    }

    /**
     * 产品分类
     *
     * @access private
     * @static funciton
     * @return Array
     */
    private static function classify(){

        //查找产品类别中的父类名称  type=1 公司产品分类
         $classifyRes = Classify::select(['sort','name','parentId'])->where('type','=','1')->orderBy('sort','asc')->get();
         // $classifyRes = Classify::where('type','=','1')->select(['sort','name','parentId'])->get();

         if(!$classifyRes){

            return array();

         }

         $classifyData = array();

         foreach ($classifyRes as $list) {

            $classifyData[$list->sort]=$list;
         }

        return $classifyData;
    }

    /**
     * ajax 查找供应商检查
     *
     * @access public
     * @static funciton
     * @todo  淘汰此方法
     */
    public static function keyword(){

        $input = Input::only('query');
        $query = $input['query'];
        $keyword = $query['keyword'];
         
        $num = array();
        foreach (self::$whereField as $field) {

            if($field=='name'){//类别统计
                
                $num[$field] = Classify::where('type' ,'=', 1)->where($field,'regexp',$keyword)->count();

            }else{

                $num[$field] = Product::where($field ,'regexp',$keyword)->count();

            }
        }

        $tmpFiledKey=self::$defaultField;
        $tmpFiledValue=0;

        foreach ($num as $key => $value) {

            if($value>$tmpFiledValue){

                $tmpFiledKey=$key;

                $tmpFiledValue=$value;

            }
        }
 

        if($tmpFiledKey=='name'){//根据类型查找

            $res = Classify::select($field)->where('type' ,'=', 1)->where($field,'regexp',$keyword)->where('close','=',0)->orderBy($tmpFiledKey,'asc')->limit(10)->get()->toArray();

        }else{

            $res = Product::select($tmpFiledKey)->where($tmpFiledKey,'regexp',$keyword)->orderBy($tmpFiledKey,'asc')->limit(10)->get()->toArray();

        }

        $data = array();

        foreach ($res as $key => $list) {

            $data [] = ['name'=>$list[$tmpFiledKey],'field'=>$tmpFiledKey];

        }

        echo json_encode($data);
    }

    /**
     * 添加公司产品
     *
     * @access public
     * @static funciton
     */
    public static function create($supplierId=false){

        //查找公司产品分类
        $type = Classify::select(['id','name','sort'])->where('close','0')->where('type','=',1)->orderBy('sort','asc')->get()->toArray();

        $supplierId = intval($supplierId);

        if($supplierId>0){

            $data = Supplier::find($supplierId,['fullName','supplierId'])->toArray();

        }else{

            $data = ['fullName'=>false,'supplierId'=>false];

        }


        return view('cms.product.create',compact('type','data'));
    }
    /**
     * 根据产品ID编辑该产品
     *
     * @param Integer $productId  产品ID
     * @todo 没有判断ID是否存在
     */
    public static function edit($productId){

        $data = Product::find($productId);
 
        //查找该产品的供应商
        $type = Classify::select(['id','name','sort'])->where('close','0')->where('type','=',1)->orderBy('sort','asc')->get()->toArray();

        $supplierData = Supplier::select(['fullName'])->where('supplierId',$data->supplierId);

        if($supplierData && $data->supplierIdExt){
            $supplierData->orWhere('supplierId',$data->supplierIdExt);
        }

        $supplier = $supplierData->get()->toArray();


        return view('cms.product.edit',compact('data','type','supplier'));
    }

    /**
     * 更新公司产品
     *
     * <p>此接口地址：post.cms/product/{productId}</p>
     * @param Integer $productId  产品ID
     */
    public function update($productId){

        $input = Input::except('_token','_method','supplierId_','supplierIdExt_');

        //验证数据
        $validatorData = self::validatorData($input);

        if($validatorData['validator']->passes()===true){

            $res = Product::where('productId',$productId)->update($validatorData['input']);
            
            if($res){
                return redirect(url('cms/alert',array('mes'=>'更新成功！','url'=>urlencode(url('cms/product/'.$productId.'/edit')))));
            }else{
                return redirect(url('cms/alert',array('mes'=>'更新失败！','url'=>urlencode(url('cms/product/'.$productId.'/edit')))));
            }

        }else{

            return back()->withErrors($validatorData['validator']);

        }
    }
    /**
     * 产品入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确
     * @access public
     * @static Function
     */
    public static function store(){
        $input = Input::except(array("_token","supplierId_","supplierIdExt_"));

        if($input){

            //验证数据
            $validatorData = self::validatorData($input);

            if($validatorData['validator']->passes()===true){

                $res = Product::create($validatorData['input']);
                if($res){
                    return redirect(url('cms/alert',array('mes'=>'保存成功','url'=>urlencode(url('cms/product')))));
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }
            }else{
                return back()->withErrors($validatorData['validator']);

            }
        }
    }


    /**
     *  验证库房数据
     *
     * @param array $input
     * @return boolean | array
     *
     */
    private static function validatorData($input){
            if(!is_array($input) && count($input)<5){
                return false;
            }

            $rules = [
                'supplierId'=>'required|integer',
                'supplierIdExt'=>'integer',
                'chineseBrand'=>'required|min:2|max:30',
                'englishBrand'=>'required|min:5|max:100',
                'brandName'=>'required|min:2|max:30',
                'number'=>'required|max:30',
                'color'=>'max:30',
                'unit'=>'max:30',
                'packageNum'=>'max:30',
                'packageRules'=>'max:30',
                'expiration'=>'max:30',
                'stockPrice' => 'required|numeric',

                'costPrice' => 'required|numeric',

                'standardPrice' => 'required|numeric',

                // 'oneTypePrice' => 'required|numeric',

                // 'twoTypePrice' => 'required|numeric',

                // 'barCode'=>'required|min:10|max:30',
                // 'qrCode'=>'required|min:10|max:30',
            ];

            $message = [

                'supplierId.required'=>'请选择正确的供应商',
                'supplierId.integer'=>'请选择正确的供应商',

                'supplierIdExt.integer'=>'请选择正确的辅助供应商',

                'chineseBrand.required'=>'品牌(中文)填写不正确',
                'chineseBrand.min'=>'品牌(中文)最少2个字符',
                'chineseBrand.max'=>'品牌(中文)最多30个字符',


                'englishBrand.required'=>'品牌(英文)填写不正确',
                'englishBrand.min'=>'品牌(英文)最少5个字符',
                'englishBrand.max'=>'品牌(英文)最多100个字符',

                'brandName.required'=>'品名填写不正确',
                'brandName.min'=>'品名最少2个字符',
                'brandName.max'=>'品名最多30个字符',

                'number.required'=>'货号填写不正确',
                'number.max'=>'货号最多30个字符',

                // 'standard.required'=>'简要规格填写不正确',
                // 'standard.max'=>'简要规格最多250个字符',

                'color.max'=>'颜色最多30个字符',
                'unit.max'=>'单位最多30个字符',
                'packageNum.max'=>'最小包规计算数量最多30个字符',
                // 'type.in'=>'类型选择不正确',
                'packageRules.max'=>'包规最多30个字符',
                // 'description.required'=>'产品详细描述必须填写',
                'expiration.max'=>'产品效期最多30个字符',

                'stockPrice.required' => '进货单价有误',
                'stockPrice.numeric' => '进货单价有误',

                'costPrice.required' => '成本单价有误',
                'costPrice.numeric' => '成本单价有误',

                'standardPrice.required' => '标准售价有误',
                'standardPrice.numeric' => '标准售价有误',

                // 'oneTypePrice.required' => '分类售价一有误',
                // 'oneTypePrice.numeric' => '分类售价一有误',

                // 'twoTypePrice.required' => '分类售价二有误',
                // 'twoTypePrice.numeric' => '分类售价二有误',


                // 'barCode.required'=>'条形码有误',
                // 'barCode.min'=>'条形码有误',
                // 'barCode.max'=>'条形码有误',

                // 'qrCode.required'=>'二维码有误',
                // 'qrCode.min'=>'二维码有误',
                // 'qrCode.max'=>'二维码有误',

            ];

            $validator = Validator::make($input,$rules,$message);

            $data = array('validator'=>$validator,'input'=>$input);

            return $data ;
    }


    /**
     * 删除该产品
     *
     * <p> delete.cms/product/{$productId}</p>
     * @param Integer | String $productId 公司产品ID
     * @todo 没有判断ID是否存在
     * @return json
     */
    public static function destroy($productId){


        $input = Input::only("status");

        $status = intval($input['status']);


        $ids = explode(',', $productId);

        if(count($ids)>1){// 批量操作
            
            foreach ($ids as $k => $id) {
                
                $id =intval($id); 

                if($k==0){
                    $resQuery = Product::where('productId',$id);
                }else{
                    $resQuery->orWhere('productId',$id);
                }
            }
 
            $res = $resQuery->update(['close'=>$status]);
            
        }else{

            $res = Product::where("productId",$productId)->update(['close'=>$status]);
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
