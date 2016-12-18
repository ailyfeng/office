<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Classify;
use App\Http\Models\Supplier;
use App\Http\Models\Product;
use Illuminate\Http\Request;

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
     * 查询产品
     */
    public static function index(){

        $data = Product::orderBy('productId','desc')->paginate(15);

        return view('cms.product.index',compact('data'));
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
