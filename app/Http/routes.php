<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/login', 'OfficeCMS\LoginController@login');


/**
 * 内容管理系统路由
 */
Route::group(['middleware' => ['admin.login'],'prefix'=>'cmss','namespace'=>'OfficeCMS'], function () {

    //默认首页
    Route::get('index', 'IndexController@index');

    //库房管理
    Route::resource('warehouse', 'WarehouseController');

    //供应商
    Route::resource('supplier', 'SupplierController');

    //公司产品
    Route::resource('product','ProductController');
    
    //上传文件
    Route::any('upload', 'OfficeCMSController@upload');

});


/**
 * 内容管理系统路由
 */
Route::group(['middleware' => ['admin.login'],'prefix'=>'cms','namespace'=>'CMS'], function () {

    //默认首页
    Route::get('/', 'IndexController@index');
    Route::resource('index', 'IndexController');

    //库房管理
    Route::resource('warehouse', 'WarehouseController');

    //供应商
    Route::any('supplier/keyword','SupplierController@keyword');
    Route::resource('supplier', 'SupplierController');

    //供应商联系人
    Route::resource('supplierContract', 'SupplierContractController');
    Route::get('supplierContract/create/{supplierId}', 'SupplierContractController@create');
    // Route::get('supplier/contractCreate/{id}','SupplierController@contractCreate');

    //公司产品
    Route::any('product/keyword','ProductController@keyword');
    Route::resource('product','ProductController');
    Route::get('product/create/{supplierId}','ProductController@create');
    // Route::resource('product/create/{productId}','ProductController@create');

    //分类
    Route::resource('classify','ClassifyController');
    Route::get('classify/create/{id}','ClassifyController@create');
    
    //上传文件
    Route::resource('upload', 'UploadController');

    //消息提示
    Route::any('alert/{mes}','AlertController@show');
    Route::any('alert/{mes}/{url}','AlertController@show');


});

