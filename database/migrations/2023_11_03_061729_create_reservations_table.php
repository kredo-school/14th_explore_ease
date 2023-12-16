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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');

            $table->date('reservation_start_date');
            $table->time('reservation_start_time');
            $table->date('reservation_end_date');
            $table->time('reservation_end_time');
            $table->integer('reservation_minutes');

            $table->unsignedBigInteger('seat_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->integer('number_of_people');
            $table->text('requests')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants');

            $table->foreign('seat_id')
                ->references('id')
                ->on('seats');

            $table->foreign('course_id')
                ->references('id')
                ->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
