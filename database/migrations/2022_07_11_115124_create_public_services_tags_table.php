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
        Schema::create('public_services_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id');
            $table->foreignId('public_services_id');
            $table->timestamps();

            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');

            $table->foreign('public_services_id')
            ->references('id')
            ->on('public_services')
            ->onDelete('cascade');

            $table->unique(['public_services_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_services_tags');
    }
};
