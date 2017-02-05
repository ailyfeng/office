<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WarehouseeProduct 库房产品管理
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Models
 * @version V.D.1.0
 */
class WarehouseeProduct extends Model
{
    public   	$table          = 'warehouse_product';
    public   	$primaryKey     = 'id';
    public      $timestamps     = false;
    protected 	$guarded 		= [];
}
