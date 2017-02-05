<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class classify 分类管理
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Models
 * @version V.D.1.0
 *
 * <b>type 该分类属于哪张表：1-product
 * <code>
 *	<lu>
 *		<li>1 ：product 产品表</li>
 *  </lu>
 *
 *
 */
class Classify extends Model
{
    public   $table          = 'classify';
    public   $primaryKey     = 'id';
    public      $timestamps     = false;
    protected 	$guarded 		= [];
    public 		$parentName 		= false;
}
