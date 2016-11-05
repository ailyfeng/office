<?php

namespace App\Http\Controllers\OfficeCMS;

use App\Http\Models\Warehouse;
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

        $data = Warehouse::orderBy('warehouseId','desc')->paginate(15);

        return view('OfficeCMS.warehouse.index',compact('data'));
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
     * 库房入库
     *
     * @todo 选择供应商时没有判断供应商的ID,选择类型不正确，记录用户提交的数据包缓存，再提交后验证错误，并把之前提交的数据给用户。
     * @access public
     * @static Function
     */
    public static function store(){

        $input = Input::except("_token",'_method');
        if($input){
            $input['joinDate']=strtotime($input['joinDate']);
            $input['contractDate']=strtotime($input['contractDate']);
            $rules = [
                'name'=>'required|min:2|max:100',
                'address'=>'required|min:2|max:100',
                'area' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',
                'number'=>'numeric',
                'distrbutionArea'=>'required|min:2|max:100',
                'distrbutionTools'=>'required|min:2|max:100',
                'quota' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',
                'credit' => 'required|regex:[[0-9]{1,10}\.[0-9]{2}]',

                //'joinDate'=>'date',
                //'contractDate'=>'date',
            ];

            $message = [
                'name.required'=>'请填写库房名称',
                'name.min'=>'库房名称最少2个字符',
                'name.max'=>'库房名称最多100个字符',

                'address.required'=>'请填写库房地址',
                'address.min'=>'库房地址最少2个字符',
                'address.max'=>'库房地址最多100个字符',

                'area.required' => '请填写库房面积',
                'area.regex' => '库房面积保留2位小数',

                'number.numeric'=>'请填写员工人数',

                'distrbutionArea.required'=>'请填写配送区域',
                'distrbutionArea.min'=>'配送区域最少4个字符',
                'distrbutionArea.max'=>'配送区域最多100个字符',

                'distrbutionTools.required'=>'请填写配送工具情况',
                'distrbutionTools.min'=>'配送工具情况最少4个字符',
                'distrbutionTools.max'=>'配送工具情况最多100个字符',

                'quota.required' => '请填写储值额度',
                'quota.regex' => '储值额度保留2位小数',

                'credit.required' => '请填写授信额度',
                'credit.regex' => '授信额度保留2位小数',

                //'joinDate.date'=>'请填写加盟日期',
                //'contractDate.date'=>'请填写合同到期日',



            ];

            $validator = Validator::make($input,$rules,$message);

            if($validator->passes() ===true){
                $res = Warehouse::create($input);
                if($res){
        dd($input);
                    return redirect('cms/warehouse');
                }else{
                    return back()->with('errors','数据填充失败！请稍后重试');
                }
            }else{

                return back()->withErrors($validator);

            }
        }
    }

    /**
     * 删除库房
     *
     * <p> delete.cms/warehouse/{$warehouseId}</p>
     * @param $warehouseId
     * @return json
     * <code>
     *      {"status":0,"msg":"\删除成功"}
     * </code>
     */
    public static function destroy($warehouseId){
        $res = Warehouse::where("warehouseId",$warehouseId)->delete();
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
