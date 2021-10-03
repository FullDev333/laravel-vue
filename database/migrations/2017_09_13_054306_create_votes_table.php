<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->comment('投票的标题');
            $table->text('options')->comment('选项json字符串');
            $table->date('start_at')->nullable()->comment('投票开始时间');
            $table->date('end_at')->nullable()->comment('投票结束时间');
            $table->integer('max_number')->default(0)->commnet('最多投票人数，0表示不限制');
            $table->tinyInteger('is_finish')->default(0)->comment('是否结束，可强制结束投票(0|1)');
            $table->tinyInteger('status')->default(1)->comment('状态(0|1)');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
