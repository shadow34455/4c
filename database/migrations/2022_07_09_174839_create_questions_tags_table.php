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
        Schema::create('questions_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id');
            $table->foreignId('question_id');
            $table->timestamps();

            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');

            $table->foreign('question_id')
            ->references('id')
            ->on('questions')
            ->onDelete('cascade');

            $table->unique(['question_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_tags');
    }
};
