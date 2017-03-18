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
        return array('0'=>'专职','1'=>'兼职','2'=>'计时工');
    }

    /**
     * 员工部门
     *
     * @return array
     */
    public static function departmentId(){
        return array('0'=>'销售部','1'=>'库房管理','2'=>'技术部','3'=>'财务部','4'=>'送货部');
    }

    /**
     * 员工评定级别
     *
     * @return array
     */
    public static  function level(){
        return ['0'=>'一级','1'=>'二级','2'=>'三级','3'=>'四级','4'=>'五级','5'=>'六级'];
    }


    /**
     * 性别
     *
     * @return array
     */
    public static function sex(){
        return ['0'=>'先生','1'=>'女士'];
    }

    /**
     * 人事档案管理查询的权限分级
     *
     * @return array
     */
    public static function checkLevel(){
        return ['0'=>'一级','1'=>'二级','2'=>'三级','3'=>'四级','4'=>'五级','5'=>'六级'];
    }


}
