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
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('usertype_id'); // Column追加

            $table->foreign('usertype_id')
                ->references('id')
                ->on('usertypes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign('profiles_usertype_id_foreign'); //ForeignKey削除
            $table->dropColumn('usertype_id');  //Column削除
        });
    }
};
