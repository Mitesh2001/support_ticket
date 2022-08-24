<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFaultColumnRidf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('r_i_d_f_s', function (Blueprint $table) {
            $table->dropColumn('fault');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('r_i_d_f_s', function (Blueprint $table) {
            $table->text('fault')->after('end_date')->nullable();
        });
    }
}
