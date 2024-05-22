<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *
     */
    public function up()
    {
        Schema::table('user_account', function (Blueprint $table) {
            $table->string('roles')->default('USER');
        });
    }

    /**
     * Reverse the migrations.
     *
     * 
     */
    public function down()
    {
        Schema::table('user_account', function (Blueprint $table) {
            $table->dropColumns('roles');
        });
    }
};
