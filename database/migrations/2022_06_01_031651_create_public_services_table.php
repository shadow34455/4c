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
        Schema::create('public_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('Personal_account_id')->nullable();
            $table->string('Personal_account_username')->nullable();
            $table->string('Subject');
            $table->string('description'); 
            $table->decimal('price');
            $table->unsignedInteger('status')->default(0);
            $table->date('dead_line');
            
            $table->text('Attachments')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_services');
    }
};
