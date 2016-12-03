<?php

namespace App\Http\Controllers\CMS;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

/**
 * 文件上传  CMS中模块都要继承它
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\CMS
 * @version V.d.0.1
 */
class UploadController extends CMSController
{


    /**
     * 上传图片
     *
     *
     * @access public
     * @todo 上传图片不兼容Firefox
     * @static function
     *
     */
    public static function index() {
        
        $data = array();

        return view('cms.upload.index',compact('data'));
    }


    /**
     * 根据父类id传递参数给夫类
     *
     * @param Integer $id   父类id
     * @todo 没有判断ID是否存在
     */
    public static function edit($id){
        
        return view('cms.upload.index',compact('id'));

    }


    /**
     *  图片上传
     *
     * @todo 没有根据店划分，店上传的图片，没有排错
     * @access public
     * @static function
     * @return String
     */
    public static function store() {
        
        $data = array('code'=>1,'src'=>null);

        $file = Input::file('Filedata');

        if($file->isValid()){

            $entension = $file->getClientOriginalExtension();

            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;

            $path = $file->move(base_path().'/uploads/',$newName);

            $filePath    = 'uploads/'.$newName;
            
            return $filePath;

        }
    }

    public function show(){}
    
}
