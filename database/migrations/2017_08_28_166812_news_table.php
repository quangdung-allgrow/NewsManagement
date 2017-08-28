<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('news_cate_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title', 500)->nullable();
            $table->string('title_slug', 500)->nullable();
            $table->string('short_desc', 500)->nullable();
            $table->text('content')->nullable();
            $table->string('keyword_seo', 500)->nullable();
            $table->string('description_seo', 500)->nullable();
            $table->tinyInteger('pin')->default(0);
            $table->tinyInteger('lock')->default(0);
            $table->string('thumbnail', 1000)->nullable();
            $table->integer('views')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('news_cate_id')->references('id')->on('news_categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
