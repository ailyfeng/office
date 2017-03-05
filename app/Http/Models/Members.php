<?php

namespace App\App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Members 员工表（管理员）
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Models
 * @version V.D.1.0
 */
class Members extends Model
{
    
    public   $table          = 'members';
    public   $primaryKey     = 'memberId';
    public      $timestamps     = false;
    protected 	$guarded 		= [];
}
