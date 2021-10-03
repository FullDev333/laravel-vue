<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_lists', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('video_id')->comment('所属视频');
            $table->string('title', 100)->comment('标题');
            $table->string('auther', 20)->default('')->comment('作者');
            $table->string('video_url')->commnet('视频路径');
            $table->text('tag_include')->nullable()->comment('标签');
            $table->string('source')->default('')->comment('来源');
            $table->integer('is_audit')->default(0)->comment('审核(select)');
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
        Schema::dropIfExists('video_lists');
    }
}
