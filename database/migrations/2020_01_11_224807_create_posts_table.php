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
            $table->string('name');
            $table->string('description');
            $table->text('content');
            $table->bigInteger('price');
            $table->bigInteger('price_promo');
            $table->string('image');
            $table->integer('category_id');
            $table->timestamp('published_at')->nullable();
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
