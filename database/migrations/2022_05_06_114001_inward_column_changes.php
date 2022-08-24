<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InwardColumnChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inwards', function (Blueprint $table) {
            $table->dropColumn('customer');
            $table->dropColumn('product');
            $table->dropColumn('customer_id');
            $table->integer('product_id')->after('task_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inwards', function (Blueprint $table) {
            $table->string('customer')->nullable();
            $table->string('product')->nullable();
            $table->integer('customer_id')->after('task_id')->default(0);
        });
    }
}
