<?php

namespace App\Http\Controllers\OfficeCMS;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

/**
 * 基本控制器  OfficeCMS中模块都要继承它
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\OfficeCMS
 * @version V0.1
 */
class OfficeCMSController extends Controller
{

    /**
     *  图片上传
     *
     * @todo 没有根据店划分，店上传的图片
     * @access public
     * @return String
     */
    public function upload(){
        $file = Input::file('Filedata');
        if($file->isValid()){

            $entension = $file->getClientOriginalExtension();

            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;

            $path = $file->move(base_path().'/uploads/',$newName);

            $filepath= 'uploads/'.$newName;

            return $filepath;
        }
    }
}
