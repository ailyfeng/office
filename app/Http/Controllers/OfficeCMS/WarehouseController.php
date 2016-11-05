<?php

namespace App\Http\Controllers\OfficeCMS;

use App\Http\Models\warehouse;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;


/**
 * 库房管理表
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\\OfficeCMS
 * @version V0.1
 */
class WarehouseController extends OfficeCMSController
{
    /**
     * 查询库房表
     */
    public static function index(){

        return view('OfficeCMS.warehouse.index');
    }

    /**
     * 添加库房表
     *
     * @access public
     * @static funciton
     */
    public static function create(){

        return view('OfficeCMS.warehouse.create');
    }

    /**
     *编辑库房
     *
     * @access public
     * @static funciton
     */
    public static function edit(){

        return view('OfficeCMS.warehouse.edit');
    }

    /**
     * 向该库添加产品
     *
     * @access public
     * @static funciton
     */
    public static function update(){

        $input = Input::except("_token",'_method');
        $res = Product::where('productId',$productId)->update($input);
        if($res){
            return redirect('cms/product');
        }else{
            return back()->with('errors','更新失败！');
        }
    }


    /**
     * 根据库房表ID编辑
     *
     * @param Integer $warehouseId  产品ID
     */
    public static function warehouseEditView($warehouseId){
        echo __CLASS__."::".__FUNCTION__;
    }

    /**
     * 库房入库
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
                $res = warehouse::create($input);
                if($res){
//                    dd($res);
                    return redirect('cms/warehouse_list');
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }
            }else{

                return back()->withErrors($validator);

            }
        }
    }

    /**
     * 删除库房表
     *
     * @param $warehouseId
     */
    public static function warehouseDelete($warehouseId){
        echo __CLASS__."::".__FUNCTION__;
    }



}
