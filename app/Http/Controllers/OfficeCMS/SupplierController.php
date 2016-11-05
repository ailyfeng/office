<?php

namespace App\Http\Controllers\OfficeCMS;

use App\Http\Models\supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;


/**
 * 公司产品供应商
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\\OfficeCMS
 * @version V0.1
 */
class SupplierController extends OfficeCMSController
{
    /**
     * 查询公司产品供应商
     */
    public static function index(){

        $data = Supplier::orderBy('supplierId','desc')->paginate(15);
        $isBoolean = Supplier::isBoolean();

        return view('OfficeCMS.supplier.index',compact('data','isBoolean'));
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

        return view('OfficeCMS.supplier.create',compact('isBoolean','type'));
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
        return view('OfficeCMS.supplier.edit',compact('data','isBoolean','type'));
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
            $input['type'] = serialize(json_encode($input['type']));
            $rules = [
                'fullName'=>'required|min:2|max:100',
                'abbreviation'=>'required|min:2|max:30',
                'brand'=>'required|min:2|max:30',
                'brand'=>'required|min:2|max:30',
                'brandType'=>'required|min:2|max:30',
                'officeAdd'=>'required|min:2|max:100',
                'warehoustAdd'=>'required|min:2|max:100',
                'area'=>'required|min:2|max:30',
                'settlementMmethod'=>'required|min:2|max:30',
                'paymentMethod'=>'required|min:2|max:30',
                'priceTax' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',
                'priceNoTax' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',
                'credit'=>'required|min:2|max:30',
            ];

            $message = [
                'fullName.required'=>'请填写供应商全称',
                'fullName.min'=>'供应商全称最少2个字符',
                'fullName.max'=>'供应商全称最多100个字符',

                'abbreviation.required'=>'请填写供应商简称',
                'abbreviation.min'=>'供应商简称最少2个字符',
                'abbreviation.max'=>'供应商简称最多30个字符',

                'brand.required'=>'请填写供应品牌',
                'brand.min'=>'供应品牌最少2个字符',
                'brand.max'=>'供应品牌最多30个字符',

                'brandType.required'=>'请填写供应品类',
                'brandType.min'=>'供应品类最少2个字符',
                'brandType.max'=>'供应品类最多30个字符',

                'officeAdd.required'=>'请填写办公地址',
                'officeAdd.min'=>'办公地址最少2个字符',
                'officeAdd.max'=>'办公地址最多100个字符',

                'warehoustAdd.required'=>'请填写库房地址',
                'warehoustAdd.min'=>'库房地址最少2个字符',
                'warehoustAdd.max'=>'库房地址最多100个字符',

                'area.required'=>'请填写采购区域',
                'area.min'=>'采购区域最少2个字符',
                'area.max'=>'采购区域最多30个字符',

                'settlementMmethod.required'=>'请填写结算方式',
                'settlementMmethod.min'=>'结算方式最少2个字符',
                'settlementMmethod.max'=>'结算方式最多30个字符',

                'paymentMethod.required'=>'请填写收款方式',
                'paymentMethod.min'=>'收款方式最少2个字符',
                'paymentMethod.max'=>'收款方式最多30个字符',

                'priceTax.required' => '请填写结算价格（含税）',
                'priceTax.regex' => '结算价格（含税）有误',

                'priceNoTax.required' => '请填写结算价格（不含税）',
                'priceNoTax.regex' => '结算价格（不含税）有误',

                'credit.required'=>'请填写授信额度',
                'credit.min'=>'授信额度最少2个字符',
                'credit.max'=>'授信额度最多30个字符',
            ];


            $validator = Validator::make($input,$rules,$message);

            if($validator->passes() ===true){
                $res = Supplier::create($input);
                if($res){
                    return redirect('cms/supplier');
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }
            }else{

                return back()->withErrors($validator);

            }
        }
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
        $input['type'] = serialize(json_encode($input['type']));
        $res = Supplier::where('supplierId',$supplierId)->update($input);
        if($res){
            return redirect('cms/supplier');
        }else{
            return back()->with('errors','更新失败！');
        }
    }

    /**
     * 删除供应商
     *
     * <p> delete.cms/supplier/{$supplierId}</p>
     * @param $supplierId 公司产品ID
     * @todo 没有判断ID是否存在
     * @return json
     */
    public static function destroy($supplierId){
        $res = Supplier::where("supplierId",$supplierId)->delete();
        if($res){
            $data = [
                'status'=>1,
                'msg'=>'删除成功',
            ];
        }else{
            $data = [
                'status'=>0,
                'msg'=>'删除失败！请稍后重试',
            ];

        }
        return $data;
    }

}
