<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_blog', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('icon');
            $table->tinyInteger('parintid')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('tages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tages')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('post');
            $table->string('img');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default(0);
            $table->integer('view')->default(1);
            $table->integer('like')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_blog');
        Schema::dropIfExists('tages');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('posts');
    }
}
