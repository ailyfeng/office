<?php

namespace App\Http\Controllers\OfficeCMS;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * 后台首页
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\OfficeCMS
 * @version V0.1
 */
class IndexController extends OfficeCMSController
{
    /**
     * 后台默认首页
     *
     * @access public
     * @static function
     *
     */
    public static function index(){
        return view('OfficeCMS.Index.index');
    }


    public function info()
    {
        return view('admin.info');
    }

}
