<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0);
            $table->text('reason')->nullable();
            $table->integer('status_trackable_id');
            $table->string("status_trackable_type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_tracks');
    }
}
