<?php

namespace App\Http\Models;

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

    /**
     * 雇佣方式
     *
     * @return array
     */
    public static function employType(){
        return array('1'=>'专职','2'=>'兼职','3'=>'计时工');
    }

    /**
     * 员工部门
     *
     * @return array
     */
    public static function departmentId(){
        return array('1'=>'销售部','2'=>'库房管理','3'=>'技术部','4'=>'财务部','5'=>'送货部');
    }

    /**
     * 员工评定级别
     *
     * @return array
     */
    public static  function level(){
        return ['1'=>'一级','2'=>'二级','3'=>'三级','4'=>'四级','5'=>'五级','6'=>'六级'];
    }


    /**
     * 性别
     *
     * @return array
     */
    public static function sex(){
        return ['1'=>'先生','2'=>'女士'];
    }

    /**
     * 人事档案管理查询的权限分级
     *
     * @return array
     */
    public static function checkLevel(){
        return ['1'=>'一级','2'=>'二级','3'=>'三级','4'=>'四级','5'=>'五级','6'=>'六级'];
    }


}
