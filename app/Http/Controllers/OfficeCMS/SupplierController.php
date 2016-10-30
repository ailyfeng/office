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
    public static function supplierList(){

        return view('OfficeCMS.supplier.list');
    }

    /**
     * 添加公司产品供应商
     *
     * @access public
     * @static funciton
     */
    public static function supplierAdd(){

        return view('OfficeCMS.supplier.add');
    }
    /**
     * 根据供应商ID编辑该供应商
     *
     * @param Integer $supplierId  产品ID
     */
    public static function supplierEditView($supplierId){
        echo __CLASS__."::".__FUNCTION__;
    }

    /**
     * 供应商入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确
     * @access public
     * @static Function
     */
    public static function producStorage(){
        $input = Input::except("_token");
        if($input){

            $rules = [
            ];

            $message = [

            ];

        if($input['type']){
            $input[$input['type']]=1;
            unset($input['type']);
        }

            $validator = Validator::make($input,$rules,$message);

            if($validator->passes() ===true){
                $res = supplier::create($input);
                if($res){
//                    dd($res);
                    return redirect('cms/supplier_list');
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }
            }else{

                return back()->withErrors($validator);

            }
        }
    }

    /**
     * 删除供应商
     *
     * @param $supplierId
     */
    public static function supplierDelete($supplierId){
        echo __CLASS__."::".__FUNCTION__;
    }



}
