<?php

namespace App\Http\Models\ClientMember;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientMember 客户联系表
 * @package App\Http\Models
 */
class ClientMember extends Model
{
    public   $table             = 'client_member';
    public   $primaryKey        = 'id';
    public      $timestamps     = false;
    protected 	$guarded 		= [];

    /**
     * 性别
     *
     * @return array
     */
    public static function sexList(){
        return ['1'=>'先生','2'=>'女士'];
    }
}
