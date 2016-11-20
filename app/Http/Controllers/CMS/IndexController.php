<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * 后台首页
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\CMSController
 * @version V0.1
 */
class IndexController extends CMSController
{
    /**
     * 后台默认首页
     *
     * @access public
     * @static function
     *
     */
    public static function index(){
        return view('cms.Index.index');
    }


    /**
     *  首页登录展示
     *
     *
     */
    public static function show()
    {
        return view('cms.index.show');
    }

}
