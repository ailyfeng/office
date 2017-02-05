<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * 公司产品
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Model\OfficeCMS
 * @version V.D.1.0
 *
 *
 */
class Product extends Model
{
    public   $table           = 'product';
    public   $primaryKey     = 'productId';
    public      $timestamps     = false;

    protected   $guarded        = [];
    
    public function supplier(){
        return $this->morphMany('App\Models\Supplier', 'supplierId');
    }



    /**
     * 自定义类别
     *
     */
    public static function type(){
        return array('lg'=>'大类','md'=>'中类','xs'=>'小类');

    }
}