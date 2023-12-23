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
            $table->dropColumn('username');  //Column削除
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // $table->string('username')->unique();
            $table->string('username');
        });

        // commit のためDB::updateを外だし
        DB::update('update profiles, users
                    set profiles.username = users.name
                    where profiles.user_id = users.id');

        Schema::table('profiles', function (Blueprint $table) {
            $table->unique('username');
        });
    }
};
