<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Classify;
use App\Http\Models\Supplier;
use App\Http\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;


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
     * 要查找的字段范围  品名（中英文）统计、货号、规格、颜色 、类别
     *
     * @count  whereField
     */
    const whereField    = ['chineseBrand','englishBrand','brandName','number','color','name'];


    /**
     * 要查找的默认字段
     *
     * @count  defaultField
     */
    const defaultField  = 'chineseBrand';

    /**
     * 查询产品
     */
    public static function index(){

        $input = Input::except('_token');

        //搜索词
        $keyword = !empty($input['keyword'])?$input['keyword']:false; 
        
        //搜索字段
        $field = !empty($input['field'])?$input['field']:false;

        //判断查询的字段和keyword是否合法
        $tempField = false;
        foreach (self::whereField as $k => $v) {
            if($v==$field){
                $tempField = $field;
                break;
            }
        }

        $Product = new Product();
        
        if($keyword){//筛选查找

            $field = $tempField?$tempField:self::defaultField;
            
            if(!$tempField){ // 用户没用根据快捷搜索的功能查找 需要统计关键字使用最高的字段

                foreach (self::whereField as $field) {

                    if($field=='name'){//类别统计
                        
                        $num[$field] = Classify::where('type' ,'=', 1)->where($field,'regexp',$keyword)->count();

                    }else{

                        $num[$field] = Product::where($field ,'regexp',$keyword)->count();

                    }
                }
                // dd($num);
                $tmpFiledKey=self::defaultField;

                $tmpFiledValue=0;

                foreach ($num as $key => $value) {

                    if($value>$tmpFiledValue){
                        $tmpFiledValue=$value;
                        $field=$key;

                    }
                }

                 
            }
     // echo $field;exit;

            if($field=='name'){//根据类别查找

                //根据产品分类查找
                $classifyRes  = Classify::select('id')->where('type' ,'=', 1)->where($field,'regexp',$keyword)->orderBy($field,'asc')->first()->toArray();
                $classifyId = $classifyRes['id'];

                //通过产品类别查找产品
                $data = $Product->select(['product.*','classify.name as name',
                                        'classify.id as id',
                                        'classify.close as classifyClose',
                                        'classify.sort as sort'
                                        ])->join("classify", function ($join){ 

                               $join->on("product.type", "=", "classify.id");

                             })->where('product.type','=',$classifyId)->paginate(15);


            }else{ //不需要产品类别查找数据

                // $data = Product::where($field,'regexp',$keyword)->orderBy($field,'asc')->paginate(15);

                $data = $Product->select(['product.*','classify.name as name',
                                        'classify.id as id',
                                        'classify.close as classifyClose',
                                        'classify.sort as sort'
                                        ])->join("classify", function ($join){ 

                               $join->on("product.type", "=", "classify.id");

                             })->where($field,'regexp',$keyword)->orderBy("product.".$field,'desc')->paginate(15);

            }

 
        }else{//没有任何查找条件


            $data = $Product->select(['product.*','classify.name as name',
                                        'classify.id as id',
                                        'classify.close as classifyClose',
                                        'classify.sort as sort'
                                        ])->join("classify", function ($join){ 

                               $join->on("product.type", "=", "classify.id");

                             })->orderBy("product.productId",'desc')->paginate(15);

        }

        $pageParam = ['keyword'=>$keyword, 'field'=>$field];


        
        //公司产品分类名称
        $classifyData = self::classify();
        
        foreach ($data  as &$list) {
            if(strrpos($list->sort, '-')){
                $list->parentName = $classifyData[substr($list->sort,0,abs(strrpos($list->sort,'-')))];
            }else{
                $list->parentName = $classifyData[$list->sort];
            }
        } 
        

        //添加分页时的参数
       $data->appends($pageParam);

        return view('cms.product.index',compact('data','pageParam'));
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
         $classifyRes = Classify::where('type','=','1')->select(['sort','name','parentId'])->get();

         if(!$classifyRes){

            return array();

         }

         $classifyData = array();

         foreach ($classifyRes as $list) {

            if($list->parentId=='0'){

            $classifyData[$list->sort]='顶级分类';

            }else{

                $classifyData[$list->sort]=$list->name;

            }
         }

        return $classifyData;
    }

    /**
     * ajax 查找供应商检查
     *
     * @access public
     * @static funciton
     */
    public static function keyword(){

        $input = Input::only('query');
        $query = $input['query'];
        $keyword = $query['keyword'];
         
        $num = array();
        foreach (self::whereField as $field) {

            if($field=='name'){//类别统计
                
                $num[$field] = Classify::where('type' ,'=', 1)->where($field,'regexp',$keyword)->count();

            }else{

                $num[$field] = Product::where($field ,'regexp',$keyword)->count();

            }
        }

        $tmpFiledKey=self::defaultField;
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
        $input = Input::except("_token");

        if($input){

            //验证数据
            $validatorData = self::validatorData($input);

            if($validatorData['validator']->passes()===true){

                $res = Product::create($input);
                if($res){
                     return redirect('cms/product');
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
                // 'standard'=>'required|max:250',
                'color'=>'max:30',
                'unit'=>'max:30',
                'packageNum'=>'max:30',
                // 'type'=>'in:lg,md,xs',
                'packageRules'=>'max:30',
                // 'description'=>'required',
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
