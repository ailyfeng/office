<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier 供应商
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Models
 * @version V.D.1.0
 */
class Supplier extends Model
{
    protected   $table          = 'supplier';
    protected   $primaryKey     = 'supplierId';
    public      $timestamps     = false;
    protected   $guarded        = [];

    /**
     * 是否
     *
     * @access public
     * @static
     * @return array
     */
    public static function isBoolean(){
        return array('1'=>'是','0'=>'否');
    }

    /**
     * 商家类型
     *
     * @access public
     * @static
     * @return array
     */
    public static function type(){
        return array('0'=>'厂家','1'=>'总代','2'=>'经销商');
    }

    public function hasManyPays(){
        return $this->hasMany(new SupplierContact, 'supplierId', 'supplierId');
    }
}
