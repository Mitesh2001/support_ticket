<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RidfColumnChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('r_i_d_f_s', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('product_name');
            $table->integer('product_id')->after('inward_id');
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
            $table->string('product_name')->nullable();
            $table->string('customer_name')->nullable();
            $table->dropColumn('product_id');
        });
    }
}
