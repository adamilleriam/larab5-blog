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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('categories')->references('id');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->on('authors')->references('id');
            $table->text('title');
            $table->longText('details');
            $table->text('image')->nullable();
            $table->bigInteger('total_read')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->enum('status',['Published','Unpublished'])->default('Unpublished');
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
