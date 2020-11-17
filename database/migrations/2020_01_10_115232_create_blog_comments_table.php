<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('comment_name');
            $table->string('comment_email');
            $table->text('comment');
            $table->string('parent_id')->nullable();
            $table->string('status', 20)->default("active");
            $table->unsignedInteger('blog_id')->nullable();
            $table->foreign('blog_id')->references('id')->on('blogs');
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
        Schema::dropIfExists('blog_comments');
    }
}
