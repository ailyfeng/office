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
    protected   $table           = 'product';
    protected   $primaryKey     = 'productId';
    public      $timestamps     = false;
    protected $fillable=[
          'supplierId',
          'warehouseId',
          'supplierIdExt',
          'barCode',
          'qrCode',
          'lg',
          'md',
          'xs' ,
          'chineseBrand',
          'englishBrand',
          'brandName',
          'number',
          'standard',
          'color',
          'unit',
          'packageNum',
          'packageUnit',
          'packageRules',
          'description',
          'expiration',
          'stockPrice',
          'costPrice',
          'standardPrice',
          'oneTypePrice',
          'twoTypePrice',
        ];


    /**
     * 自定义类别
     *
     */
    public static function type(){
        return array('lg'=>'大类','md'=>'中类','xs'=>'小类');

    }
}