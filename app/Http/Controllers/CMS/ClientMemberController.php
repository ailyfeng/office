<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Models\ClientMember\ClientMember;

/**
 * Class ClientMember
 * @package App\Http\Controllers\CMS
 */
class ClientMemberController extends CMSController
{
    //

    public static function index(ClientMember $clientMember){

        return false;
    }

    public static function create(){

        $sexList = ClientMember::sexList();

        return view('cms.clientMember.create',compact('sexList'));
    }

}
