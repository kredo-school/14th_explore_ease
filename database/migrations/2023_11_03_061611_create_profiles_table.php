<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            //$table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->longText('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('nationarity_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('nationarity_id')
                ->references('id')
                ->on('nationarities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
