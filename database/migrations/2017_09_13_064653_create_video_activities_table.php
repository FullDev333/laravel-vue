<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_activities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->tinyInteger('video_id')->comment('所属视频');
            $table->date('start_at')->nullable()->comment('活动开始时间');
            $table->date('end_at')->nullable()->comment('活动结束时间');
            $table->decimal('amount', 6, 2)->default(0)->comment('活动价格');
            $table->integer('max_number')->default(0)->commnet('活动总量，0表示不限制');
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
        Schema::dropIfExists('video_activities');
    }
}
