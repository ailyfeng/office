<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientMemberTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore()
    {


        $clientMember = factory('App\Http\Models\ClientMember\ClientMember',70)->create();
//        $clientMember = factory('App\Http\Models\ClientMember\ClientMember')->make();


        $response = $this->post('cms/clientMember', $clientMember->toArray());


        $response->see('%E4%BF%9D%E5%AD%98%E6%88%90%E5%8A%9F');//表示:"保存成功",url 编码

//        $response->dontSee("客户联系人测试失败！ ");

//        ->dontSee("Rails ")
//                dd($response->response->getContent());

    }

}
