<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_texts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('video_id')->comment('所属视频');
            $table->tinyInteger('is_charge')->default(0)->comment('是否收费');
            $table->decimal('amount', 6, 2)->default(0)->comment('价格');
            $table->integer('free_time')->default(0)->comment('免费时间');
            $table->integer('free_num')->default(0)->comment('免费集数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_texts');
    }
}
