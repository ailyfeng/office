<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierRecord 供应商记录
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Models
 * @version V.D.1.0
 */
class SupplierRecord extends Model
{
    
    public   $table          = 'supplier_record';
    public   $primaryKey     = 'recordId';
    public      $timestamps     = false;
    protected 	$guarded 		= [];
    
    /**
     * 联系方式
     *
     * @access public
     * @static
     * @return array
     */
    public static function type($type=null){
        $data = array('电话','微信','QQ','邮件','拜访','其它');
        
        if(isset($type)){
            $type = intval($type);
            $data = $data[$type];
        }

        return $data;
    }
}
