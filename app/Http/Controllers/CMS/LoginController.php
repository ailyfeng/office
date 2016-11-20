<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

/**
 * 用户管理
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Controllers\OfficeCMS
 * @version V0.1
 */
class LoginController extends CMSController
{
    /**
     *  用户登陆
     *
     * @access public
     * @static function
     */
    public static function login()
    {

        if ($input = Input::all()) {
            return redirect('admin/index');
        }
        return view('OfficeCMS.Login.login');
    }
}
