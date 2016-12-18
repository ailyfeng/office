<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Classify;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;
use Monolog\Logger;


/**
 * 分类表
 *
 * @copyright   成都欧飞仕科技贸易有限公司
 * @author      Kenn
 * @version     V.D.1.
 * @todo  分类点击分类 
 */
class ClassifyController extends CMSController
{
    /**
     * 查询分类
     */
    public static function index(){

        $data = Classify::where('type','=',1)->orderBy('sort','asc')->paginate(15);

        return view('cms.classify.index',compact('data'));

    }

    /**
     * 添加库房表
     *
     * @access public
     * @static funciton
     * @todo 库房中可以选择配送区域，而不是填写
     */
    public static function create($id=false){
        
        $id=intval($id);

        if($id){
            $data = Classify::find($id);

            if($data->close){

                return redirect(url('cms/alert',array('mes'=>'必须启用该类，才能添加子类的！')));
            }
            
        }else{

             $data = array('id'=>false);
             
        }

        $parentData = Classify::where('close','!=',1)->where('type','=',1)->orderBy('sort','asc')->get();
        

        return view('cms.classify.create',compact('parentData','data'));

    }


    /**
     * 编辑分类
     *
     * @access public
     * @static funciton
     * @param   Integer $id 分类表
     */
    public static function edit($id){

        $id=intval($id);

        if($id==0){

                return redirect(url('cms/alert',array('mes'=>'该分类ID不存在！')));
        }

        $data = Classify::find($id);

        $parentData = Classify::where('close','!=',1)->where('type','=',1)->orderBy('sort','asc')->get();


        return view('cms.classify.edit',compact('data','parentData'));
    }

    /**
     * 更新库房
     *
     * @access public
     * @todo  同类下 没有判断重复名称
     * @static funciton
     */
    public static function update($id){

        $input = Input::except("_token",'_method');

        //验证数据
        $validatorData = self::validatorData($input);

        if($validatorData['validator']->passes()===true){

            if($validatorData['input']['parentId']!=0){
                $parentData    = Classify::select(['sort'])->find($validatorData['input']['parentId']);

                if(empty($parentData)){

                    return redirect(url('cms/alert',array('mes'=>'父类不存在')));

                }

                $validatorData['input']['sort'] = $parentData['sort'].'-'.$id;
                $validatorData['input']['type'] = 1; //标示产品分类
            }



            $res = Classify::find($id)->update($validatorData['input']);

            if($res){

                return redirect(url('cms/alert',array('mes'=>'保存成功')));

            }else{

                return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/classily/'.$id.'/edit')))));

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

                $parentData    = Classify::select(['id','name','sort'])->find($input['parentId']);

                if(empty($parentData)){

                    return redirect(url('cms/alert',array('mes'=>'父类不存在')));

                }

                $res = Classify::create($validatorData['input']);

                if($res){
                
                    $updateInput['sort'] = $parentData['sort'].'-'.$res->id;
                    $updateInput['type'] = 1; //标示产品分类

                    Classify::find($res->id)->update($updateInput);

                    
                    return redirect(url('cms/alert',array('mes'=>'保存成功')));
                
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
                'name'=>'required|max:10',
                'parentId'=>'required|numeric'

            ];

            $message = [
                'name.required'=>'请填写分类名称',
                'name.min'=>'分类名称最少2个字符',
                'name.max'=>'分类名称最多10个字符',

                'parentId.required'=>'请选择父类',
                'parentId.numeric'=>'选择父类有误'

            ];

            $validator = Validator::make($input,$rules,$message);

            $data = array('validator'=>$validator,'input'=>$input);

            return $data ;
    }

    /**
     * 停用某个分类
     *
     * <p> delete.cms/destroy/{$id}</p>
     * @param String $id
     * @todo 产品分类停用了，没有停用产品 product
     * @return json
     * <code>
     *      {"status":0,"msg":"\删除成功"}
     * </code>
     */
    public static function destroy($id){

        $input = Input::only("status");
        $status = intval($input['status']);
        $ids = explode(',', $id);

        if(count($ids)>1){// 批量操作

            //查找当前的类的属性
            foreach ($ids as $k => $id) {
                if($k==0){
                    $currData = Classify::where('id',$id);
                }else{
                    $currData->orWhere('id',$id);
                }
            }
            $currRes = $currData->get();

            if($status){//关闭
                foreach ($currRes as $kk => $ll) {

                    if($kk==0){
                        $res = Classify::where("sort",'regexp',$ll->sort);
                    }else{
                        $res->orWhere("sort",'regexp',$ll->sort);

                    }
                    
                }
                $res->update(['close'=>$status]);

            }else{//开启  close=0

                foreach ($currRes as $kk => $ll) {

                    if($kk==0){
                        $res = Classify::where('id',$ll->id);
                    }else{
                        $res->orWhere('id',$ll->id);
                    }

                    $res->orWhere('id',$ll->parentId);

                }

                $res->update(['close'=>$status]);
            }

        }else{ //单个操作

            //查找当前的类的属性
            $currData = Classify::find($id);
            
            if($status){ //关闭
                $res = Classify::where("sort",'regexp',$currData->sort);
                $res->update(['close'=>$status]);

            }else{//开启 close=0
                $res = Classify::where('id',$id);
                
                if($currData->parentId!=0){
                    $fid=explode('-', $currData->sort);//开启所有父类
                    foreach ($fid as $key => $value) {
                        $res->orWhere('id',$value);
                    }
                }

                $res->update(['close'=>$status]);
            }
        }

        if($res){
            $data = [
                'status'=>1,
                'msg'=>$status?'已经停用':'开启使用',
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
