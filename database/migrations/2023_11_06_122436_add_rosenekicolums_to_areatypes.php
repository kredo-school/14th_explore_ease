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
        Schema::table('areatypes', function (Blueprint $table) {
            $table->string('pref_code')->nullable();
            $table->string('pref_name')->nullable();
            $table->string('station_code')->nullable();
            $table->string('station_name')->nullable();
            $table->string('station_yomi')->nullable();
            $table->string('station_note')->nullable();
            $table->double('station_latitude')->nullable();
            $table->double('station_longitude')->nullable();
            $table->string('line_code')->nullable();
            $table->string('line_name')->nullable();
            $table->integer('order')->nullable();
            $table->string('company_code')->nullable();
            $table->string('company_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('areatypes', function (Blueprint $table) {
            $table->dropColumn('pref_code');  //Column削除
            $table->dropColumn('pref_name');  //Column削除
            $table->dropColumn('station_code');  //Column削除
            $table->dropColumn('station_name');  //Column削除
            $table->dropColumn('station_yomi');  //Column削除
            $table->dropColumn('station_note');  //Column削除
            $table->dropColumn('station_latitude');  //Column削除
            $table->dropColumn('station_longitude');  //Column削除
            $table->dropColumn('line_code');  //Column削除
            $table->dropColumn('line_name');  //Column削除
            $table->dropColumn('order');  //Column削除
            $table->dropColumn('company_code');  //Column削除
            $table->dropColumn('company_name');  //Column削除
        });
    }
};
