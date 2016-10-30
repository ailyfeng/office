<?php

namespace App\Http\Controllers\OfficeCMS;

use App\Http\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;


/**
 * 公司产品
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\\OfficeCMS
 * @version V0.1
 */
class ProductController extends OfficeCMSController
{
    /**
     * 查询产品
     */
    public static function productList(){

        return view('OfficeCMS.Product.list');
    }

    /**
     * 添加公司产品
     *
     * @access public
     * @static funciton
     */
    public static function productAdd(){

        return view('OfficeCMS.Product.add');
    }
    /**
     * 根据产品ID编辑该产品
     *
     * @param Integer $productId  产品ID
     */
    public static function productEditView($productId){
        echo __CLASS__."::".__FUNCTION__;
    }

    /**
     * 产品入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确
     * @access public
     * @static Function
     */
    public static function producStorage(){
        $input = Input::except("_token");
        if($input){

            $rules = [
                'supplierId'=>'integer',
                'chineseBrand'=>'required|min:2|max:30',
                'englishBrand'=>'required|min:5|max:100',
                'brandName'=>'required|min:2|max:30',
                'number'=>'required|max:30',
                'standard'=>'required|max:250',
                'color'=>'max:30',
                'unit'=>'max:30',
                'packageNum'=>'max:30',
                'type'=>'in:lg,md,xs',
                'packageRules'=>'max:30',
                'description'=>'required',
                'expiration'=>'max:30',
                'stockPrice' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',

                'costPrice' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',

                'standardPrice' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',

                'oneTypePrice' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',

                'twoTypePrice' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',

                'barCode'=>'required|min:10|max:30',
                'qrCode'=>'required|min:10|max:30',
            ];

            $message = [
                'supplierId.integer'=>'请选择正确的供应商',

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

                'standard.required'=>'简要规格填写不正确',
                'standard.max'=>'简要规格最多250个字符',

                'color.max'=>'颜色最多30个字符',
                'unit.max'=>'单位最多30个字符',
                'packageNum.max'=>'最小包规计算数量最多30个字符',
                'type.in'=>'类型选择不正确',
                'packageRules.max'=>'包规最多30个字符',
                'description.required'=>'产品详细描述必须填写',
                'expiration.max'=>'产品效期最多30个字符',

                'stockPrice.required' => '进货单价有误',
                'stockPrice.regex' => '进货单价有误',

                'costPrice.required' => '成本单价有误',
                'costPrice.regex' => '成本单价有误',

                'standardPrice.required' => '标准售价有误',
                'standardPrice.regex' => '标准售价有误',

                'oneTypePrice.required' => '分类售价一有误',
                'oneTypePrice.regex' => '分类售价一有误',

                'twoTypePrice.required' => '分类售价二有误',
                'twoTypePrice.regex' => '分类售价二有误',


                'barCode.required'=>'条形码有误',
                'barCode.min'=>'条形码有误',
                'barCode.max'=>'条形码有误',

                'qrCode.required'=>'二维码有误',
                'qrCode.min'=>'二维码有误',
                'qrCode.max'=>'二维码有误',

            ];

        if($input['type']){
            $input[$input['type']]=1;
            unset($input['type']);
        }

            $validator = Validator::make($input,$rules,$message);

            if($validator->passes() ===true){
                $res = Product::create($input);
                if($res){
//                    dd($res);
                    return redirect('cms/product_list');
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }
            }else{

                return back()->withErrors($validator);

            }
        }
    }

    /**
     * 删除该产品
     *
     * @param $productId
     */
    public static function productDelete($productId){
        echo __CLASS__."::".__FUNCTION__;
    }



}
