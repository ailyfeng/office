<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Warehouse;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;


/**
 * 库房管理表
 *
 * @copyright   成都欧飞仕科技贸易有限公司
 * @author      Kenn
 * @version     V.D.1.0
 */
class WarehouseController extends CMSController
{
    /**
     * 查询库房表
     */
    public static function index(){

        $data = Warehouse::where('close','!=',1)->orderBy('warehouseId','desc')->paginate(15);

        return view('cms.warehouse.index',compact('data'));
    }

    /**
     * 添加库房表
     *
     * @access public
     * @static funciton
     * @todo 库房中可以选择配送区域，而不是填写
     */
    public static function create(){
        
        return view('cms.warehouse.create');
    }

    /**
     * 编辑库房
     *
     * @access public
     * @static funciton
     * @param   Integer $warehouseId库房id
     */
    public static function edit($warehouseId){

        $data = Warehouse::find($warehouseId);

        return view('cms.warehouse.edit',compact('data'));
    }

    /**
     * 更新库房
     *
     * @access public
     * @static funciton
     */
    public static function update($warehouseId){

        $input = Input::except("_token",'_method');

        //验证数据
        $validatorData = self::validatorData($input);

        if($validatorData['validator']->passes()===true){

            $res = Warehouse::where('warehouseId',$warehouseId)->update($validatorData['input']);

            if($res){

                return redirect(url('cms/alert',array('mes'=>'保存成功')));

            }else{

                return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/warehouse/'.$warehouseId.'/edit')))));

            }

        }else{
                return back()->withErrors($validatorData['validator']);

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

            //验证数据
            $validatorData = self::validatorData($input);

            if($validatorData['validator']->passes()===true){

                $res = Warehouse::create($validatorData['input']);
                
                if($res){
                
                    return redirect('cms/warehouse');
                
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

            $input['joinDate'] = strtotime($input['joinDate']);
            $input['contractDate'] = strtotime($input['contractDate']);


            $rules = [
                'name'=>'required|min:5|max:100',
                'address'=>'required|min:5|max:100',
                'area'=>'required|numeric',
                'number'=>'required|numeric',
                'distrbutionArea'=>'required|min:5|max:250',
                'distrbutionTools'=>'required|min:5|max:250',
                'quota'=>'required|numeric',
                'credit'=>'required|numeric',
                'joinDate'=>'required|numeric',
                'contractDate'=>'required|numeric'

            ];

            $message = [
                'name.required'=>'请填写库房名称',
                'name.min'=>'库房名称最少5个字符',
                'name.max'=>'库房名称最多100个字符',

                'address.required'=>'请填写库房地址',
                'address.min'=>'库房地址最少2个字符',
                'address.max'=>'库房地址最多30个字符',

                'area.required'=>'请填写库房面积',
                'area.numeric'=>'库房面积填写有误',

                'number.required'=>'请填写员工人数',
                'number.numeric'=>'员工人数填写有误',

                'distrbutionArea.required'=>'请填写配送区域',
                'distrbutionArea.min'=>'配送区域最少5个字符',
                'distrbutionArea.max'=>'配送区域最多250个字符',

                'distrbutionTools.required'=>'请填写配送工具情况',
                'distrbutionTools.min'=>'配送工具情况最少5个字符',
                'distrbutionTools.max'=>'配送工具情况最多100个字符',

                'quota.required'=>'请填写授信额度',
                'quota.numeric'=>'授信额度填写有误',

                'credit.required'=>'请填写储值额度',
                'credit.numeric'=>'储值额度填写有误',

                'joinDate.required'=>'请填写加盟日期',
                'joinDate.numeric'=>'加盟日期填写有误',

                'contractDate.required'=>'请填写合同到期日',
                'contractDate.numeric'=>'合同到期日填写有误'

            ];

            $validator = Validator::make($input,$rules,$message);


            $data = array('validator'=>$validator,'input'=>$input);

            return $data ;
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
        $res = Warehouse::where("warehouseId",$warehouseId)->update(['close'=>1]);
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
