<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->comment('配置名称');
            $table->string('tag', 100)->comment('配置的英文标签（全大写加下划线）');
            $table->text('value')->comment('配置的值');
            $table->tinyInteger('status')->default(1)->comment('状态：1：启用；2：禁用');
            $table->string('desc')->nullable()->comment('描述');
            $table->tinyInteger('type')->default(1)->comment('配置类型分组');
            $table->text('ext')->nullable()->comment('配置的扩展');
            $table->timestamps();

            $table->index('name');
            $table->unique('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
