<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', '30')->comment('手机号');
            $table->string('username','50')->default('')->comment('名称');
            $table->string('email',50)->default('')->comment('邮箱');
            $table->string('password', '200')->comment('密码');
            $table->text('auth_token')->comment('登录token');
            $table->string('remember_token', 200)->nullable()->comment('记住登录');
            $table->tinyInteger('group')->default(0)->comment('所属分组;0:未设置');
            $table->tinyInteger('status')->default(1)->comment('启用状态;1:申请;2:启用;3:禁用');
            $table->timestamp('last_login_time')->nullable()->comment('上次登录时间');
            $table->integer('login_time')->default(0)->comment('登录次数');
            $table->timestamps();

            $table->index('phone');
            $table->index('username');
            $table->unique('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
