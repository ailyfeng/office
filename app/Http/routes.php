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
Route::group(['middleware' => ['admin.login'],'prefix'=>'cms','namespace'=>'OfficeCMS'], function () {

	//默认首页
    Route::get('index', 'IndexController@index');


    //库房管理
    Route::get('warehouse_list', 'WarehouseController@warehouseList');
    Route::get('warehouse_add', 'WarehouseController@warehouseAdd');
    Route::get('warehouse_product_list', 'WarehouseController@warehouseProductList');
    Route::get('warehouseSet_product_add', 'WarehouseController@warehouseProductAdd');

    //供应商
    Route::resource('supplier', 'SupplierController');

    //公司产品
    Route::resource('product','ProductController');
    


    Route::any('upload', 'OfficeCMSController@upload');


});
