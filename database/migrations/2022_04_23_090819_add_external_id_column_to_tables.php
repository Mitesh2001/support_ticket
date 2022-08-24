<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExternalIdColumnToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('external_id')->after('id');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->string('external_id')->after('id');
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('external_id')->after('id');
        });
        Schema::table('inwards', function (Blueprint $table) {
            $table->string('external_id')->after('id');
        });
        Schema::table('r_i_d_f_s', function (Blueprint $table) {
            $table->string('external_id')->after('id');
        });
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('external_id')->after('id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->string('external_id')->after('id');
        });
        Schema::table('feedback', function (Blueprint $table) {
            $table->string('external_id')->after('id');
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
            $table->dropColumn('external_id');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
        Schema::table('inwards', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
        Schema::table('r_i_d_f_s', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
    }
}
