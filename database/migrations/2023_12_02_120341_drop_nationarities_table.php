<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign('profiles_nationarity_id_foreign'); //ForeignKey削除
            $table->dropColumn('nationarity_id');  //Column削除

            $table->unsignedBigInteger('nationality_id');

            $table->foreign('nationality_id')
                ->references('id')
                ->on('nationalities');
        });

        Schema::dropIfExists('nationarities');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('nationarities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('countrycode')->nullable();
        });

        DB::insert('insert into nationarities (id, name, description, countrycode) select * from nationalities');

        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('nationarity_id');
        });

        // commit のためDB::updateを外だし
        DB::update('update profiles
                    set nationarity_id = nationality_id');

        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign('profiles_nationality_id_foreign'); //ForeignKey削除
            $table->dropColumn('nationality_id');  //Column削除

            $table->foreign('nationarity_id')
                ->references('id')
                ->on('nationarities');
        });
    }
};
