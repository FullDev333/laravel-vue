<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_records', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('type_id')->comment('类型');
            $table->integer('admin_id')->comment('管理员id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('email_title')->comment('邮件主题');
            $table->string('text')->default('')->comment('说明');
            $table->tinyInteger('status')->default(1)->comment('状态(0|1)');
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
        Schema::dropIfExists('email_records');
    }
}
