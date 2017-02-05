<?php 

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class supplierContact 供应商联系人
 *
 * @copyright 成都欧飞仕科技贸易有限公司
 * @author Kenn
 * @package App\Http\Models
 * @version V.D.1.0
 */
class SupplierContact extends Model
{
    public   $table          = 'supplier_contact';
    public   $primaryKey     = 'contactId';
    public      $timestamps     = false;
    protected 	$guarded 		= [];



    /**
     * 性别
     *
     * @access public
     * @static
     * @return array
     */
    public static function isGender($gender=null){
        $data = array('1'=>'先生','0'=>'女士');
        
        if(isset($gender)){
            $gender = intval($gender);
            $data = $data[$gender];
        }

        return $data;
    }

    // public function belongsToUser(){
    //     return $this->belongsTo(new Supplier(), 'supplierId', 'supplierId');
    // }
    
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

}
