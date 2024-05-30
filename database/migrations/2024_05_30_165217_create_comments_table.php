<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->unsignedBigInteger('board_id');
            $table->string('comment_content', 200);
            $table->string('comment_author', 50);
            $table->timestamp('comment_created_at')->useCurrent(); 
            $table->timestamp('comment_updated_at')->useCurrent()->useCurrentOnUpdate(); 
            $table->foreign('board_id')->references('board_id')->on('boards')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
