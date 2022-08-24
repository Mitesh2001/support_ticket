<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInwardIdColumnToRidfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('r_i_d_f_s', function (Blueprint $table) {
            $table->integer('inward_id')->after('external_id')->default(0);
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
            $table->dropColumn('inward_id');
        });
    }
}
