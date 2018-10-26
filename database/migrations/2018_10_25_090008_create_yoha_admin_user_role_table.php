<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYohaAdminUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yoha_admin_user_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->comment('角色名称');
            $table->string('tag', 50)->comment('英文标签');
            $table->tinyInteger('status')->default(1)->comment('状态：1：启用；2：禁用');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yoha_admin_user_role');
    }
}
