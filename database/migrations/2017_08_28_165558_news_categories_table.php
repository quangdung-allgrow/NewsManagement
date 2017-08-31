<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('parent_id')->default(0);
            $table->string('title', 500)->nullable();
            $table->string('title_slug', 500)->nullable();
            $table->string('title_seo', 500)->nullable();
            $table->string('keyword_seo', 500)->nullable();
            $table->string('description_seo', 500)->nullable();
            $table->tinyInteger('priority')->default(0);
            $table->tinyInteger('lock')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('news_categories');
    }
}
