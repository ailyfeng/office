<?php

namespace App\Http\Controllers\CMS;

use App\Http\Models\Supplier;
use App\Http\Models\SupplierContact;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\Input;
use Validator;


/**
 * 公司产品供应商联系方式
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @version V.D.1.0
 */
class SupplierContractController extends CMSController
{
    /**
     * 查询公司产品供应商
     */
    public static function index(){

        //产品选择供应商时要用到一下参数
        $selectSupplier = Input::get('selectSupplier')=='selectSupplier'?true:false;

        $id = Input::get('id');
        
        $name = Input::get('name');

        $data = Supplier::where('close','!=',1)->orderBy('supplierId','desc')->paginate(15,['*'],'aaa');

        $isBoolean = Supplier::isBoolean();

        return view('cms.supplierContract.index',compact('data','isBoolean','selectSupplier','id','name'));
    
    }


    /**
     * 添加供应商联系人
     *
     * @access public
     * @param Integer $supplierId  供应商ID
     * @static funciton
     */
    public static function create($supplierId){

        $data = Supplier::find($supplierId);

        $isGender = SupplierContact::isGender();

        return view('cms.supplierContract.create',compact('isGender','data'));
    }

    /**
     * 编辑供应商联系人ID
     *
     * @param Integer $supplierId  产品ID
     */
    public static function edit($supplierId){

        $data = SupplierContact::find($supplierId);
         

        $type = SupplierContact::isGender();
 

        return view('cms.supplierContract.edit',compact('data','type'));
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

            $validator = self::validatorData($input);

            if($validator['validator']->passes() ===true){
                
                $res = SupplierContact::create($validator['input']);

                if($res){ 
                    
                   return redirect(url('cms/alert',array('mes'=>'保存成功，可以继续添加联系人','url'=>urlencode(url('cms/supplierContract/create/'.$input['supplierId'])))));

                
                }else{

                    return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/supplierContract/create/'.$input['supplierId'])))));

                }
            }else{

                return back()->withErrors($validator['validator']);

            }
        }
    }

    /**
     *  验证供应商入库时的参数
     *  
     *  @param Array $input 供应商入库时的参数
     *  @static Function
     *  @return Array | false
     */
    public static function validatorData($input){

        if(!is_array($input)){
            return false;
        }

            $input['birthday'] = strlen($input['birthday'])>5?strtotime($input['birthday']):0;
            // dd($input);
            $rules = [
                'name'=>'required|min:2|max:30',
                // 'nickname'=>'min:2|max:30',
                // 'position'=>'max:250',
                // 'age'=>'numeric|max:3',
                // 'phone'=>'numeric|min:6|max:11',
                // 'telOne'=>'numeric|min:11|max:11',
                // 'telTwo'=>'numeric|min:11|max:11',
                // 'email'=>'email',
                // 'qq' => 'numeric|min:4|max:11',
                // 'wechat'=>'min:3|max:20',
                // 'account'=>'min:5|max:40',
                // 'birthday' => 'numeric',
                // 'note'=>'max:250'
            ];

            $message = [
                'name.required'=>'请填写姓名',
                'name.min'=>'姓名最少2个字符',
                'name.max'=>'姓名最多30个字符',

                // 'nickname.min'=>'英文名/昵称最少2个字符',
                // 'nickname.max'=>'英文名/昵称最多30个字符',

                // 'position.max'=>'职位/描述最大为250位',


                // 'age.numeric'=>'年龄有误',
                // 'age.max'=>'年龄有误1',

                // 'phone.numeric'=>'座机电话有误',
                // 'phone.min'=>'座机电话最少6位字符',
                // 'phone.max'=>'座机电话最多11位字符',

                // 'phoneExt.numeric'=>'分机有误',
                // 'phoneExt.min'=>'分机有误最少1位字符',
                // 'phoneExt.max'=>'分机有误最多11位字符',

                // 'telOne.numeric'=>'手机一有误',
                // 'telOne.min'=>'手机一有误',
                // 'telOne.max'=>'手机一有误',


                // 'telTwo.numeric'=>'手机二有误',
                // 'telTwo.min'=>'手机二有误',
                // 'telTwo.max'=>'手机二有误',


                // 'email.email'=>'邮箱不正确',

                // 'qq.numeric'=>'QQ必须是数字',
                // 'qq.min'=>'QQ最少2个字符',
                // 'qq.max'=>'QQ最多11个字符',

                // 'wechat.min'=>'微信最少5个字符',
                // 'wechat.max'=>'微信最多40个字符',

                // 'account.min'=>'个人帐户最少5个字符',
                // 'account.max'=>'个人帐户最多40个字符',

                // 'birthday.numeric' => '生日有误',
                // 'note.max'=>'附注最多250个字符'
            ];


            $validator = Validator::make($input,$rules,$message);

            $data = array('input'=>$input,'validator'=>$validator);
// dd($data);
            return $data;

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


        //验证数据
        $validatorData = self::validatorData($input);
  

        if($validatorData['validator']->passes()===true){

            $res = Supplier::where('supplierId',$supplierId)->update($validatorData['input']);

            if($res){

                return redirect(url('cms/alert',array('mes'=>'保存成功')));

            }else{

                return redirect(url('cms/alert',array('mes'=>'保存失败','url'=>urlencode(url('cms/supplier/'.$supplierId.'/edit')))));

            }

        }else{
                return back()->withErrors($validatorData['validator']);

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

        $res = Supplier::where("supplierId",$supplierId)->update(['close'=>1]);

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
