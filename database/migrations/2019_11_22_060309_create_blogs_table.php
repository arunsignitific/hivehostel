<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->Increments('id');
            $table->unsignedInteger('blog_category_id')->nullable();
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
            $table->unsignedInteger('blog_author_id')->nullable();
            $table->foreign('blog_author_id')->references('id')->on('blog_authors');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('post');
            $table->string('header_img')->nullable();
            $table->string('thumb_img')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('h1')->nullable();
            $table->string('status', 20)->default("active");
            $table->string('type', 20)->default("blog");
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
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
