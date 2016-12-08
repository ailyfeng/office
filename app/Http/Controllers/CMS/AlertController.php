<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * 后台消息提示
 *
 * @copyright 	成都欧飞仕科技贸易有限公司
 * @author 		Kenn
 * @version 	V0.1
 */
class AlertController extends CMSController
{
	/**
	 *	消息提示
	 *
	 *	@param 	String 		$mes 	消息提示
	 *	@param 	Url 		$url 	地址
	 *
	 */
    public static function show($mes=false,$url=false){

    	if(!$mes){

    		$mes = '操作错误信息提示';
    	
    	}
    	
    	$url = urldecode($url);
    	
        return view('cms.alert.show',compact('mes','url'));
    
    }
}
