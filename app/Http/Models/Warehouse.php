<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier 库房管理
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Models
 * @version V.D.1.0
 */
class Warehouse extends Model
{
    protected   $table          = 'warehouse';
    protected   $primaryKey     = 'warehouseId';
    public      $timestamps     = false;
    protected 	$guarded 		= [];
}
