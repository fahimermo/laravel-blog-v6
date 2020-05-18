<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author_name');
            $table->string('author_image');
            $table->string('post_title')->unique();
            $table->integer('category_id');
            $table->string('cat_name');
            $table->longText('post_contents');
            $table->string('post_image');
            $table->string('post_tag');
            $table->tinyInteger('post_feature');
            $table->tinyInteger('post_status');
            $table->tinyInteger('post_views');
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
        Schema::dropIfExists('posts');
    }
}
