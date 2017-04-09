<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('client_member', function (Blueprint $table) {
            $table->increments('id')->comment('客户联系人ID');
            $table->string('nameChinese',30)->comment('联系人姓名');
            $table->string('nameEnglish',30)->comment('英文名/昵称');
            $table->boolean('sex')->comment('性别');
            $table->char('telOne',11)->comment('手机一');
            $table->char('telTwo',11)->comment('手机二');
            $table->string('qq',15)->comment('QQ');
            $table->string('wechat',45)->comment('微信');
            $table->string('email',45)->comment('邮箱');
            $table->integer('birthday')->comment('生日');
            $table->string('description',255)->comment('职位/描述');
            $table->tinyInteger('age')->comment('年龄段');
            $table->string('phone',30)->comment('座机电话');
            $table->string('phoneExt',10)->comment('分机');
            $table->string('account',45)->comment('个人帐户');
            $table->integer('bargainNum')->comment('交易次数');
            $table->string('note',255)->comment('附注');
            $table->boolean('close')->comment('是否删除，1:删除；0:正常使用');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('client_member', function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
}
