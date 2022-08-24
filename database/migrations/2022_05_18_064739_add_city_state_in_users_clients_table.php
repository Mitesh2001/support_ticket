<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityStateInUsersClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('state_id')->after('mobile_number')->default(0);
            $table->integer('city_id')->after('state_id')->default(0);
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->integer('state_id')->after('address')->default(0);
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
            $table->dropColumn('state_id');
            $table->dropColumn('city_id');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('state_id');
        });
    }
}
