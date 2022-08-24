<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_submits', function (Blueprint $table) {
            $table->increments('id');
            $table->date('job_date');
            $table->text('dignosys')->nullable();
            $table->integer('job_id')->unsigned();
            $table->string('action_taken')->nullable();
            $table->string('task_type')->nullable();
            $table->integer('is_bike')->default(0);
            $table->integer('is_outdoor')->default(0);
            $table->string('total')->nullable();
            $table->string('expensive')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('job_submits');
    }
}
