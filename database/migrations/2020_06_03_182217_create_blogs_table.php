<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('blogcategory_id');
            $table->string('blog_name', 100);
            $table->longText('blog_title')->nullable();
            $table->longText('blog_shot_details')->nullable();
            $table->longText('blog_long_title')->nullable();
            $table->longText('blog_long_details')->nullable();
            $table->longText('blog_images')->default('defaultblog.jpg');
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
        Schema::dropIfExists('blogs');
    }
}
