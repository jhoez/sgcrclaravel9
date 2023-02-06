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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('name')->nullable();
            $table->string('cedula',10)->after('username')->nullable();
            $table->integer('role')->after('cedula')->nullable(); // 1: superadmin, 2: admin, 3: tutor
            $table->text('two_factor_secret')->after('password')->nullable();
            $table->text('two_factor_recovery_codes')->after('two_factor_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('two_factor_secret', 'two_factor_recovery_codes');
        });
    }
};
