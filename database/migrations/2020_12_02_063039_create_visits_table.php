<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('visit_no')->nullable();
            $table->date('end_date')->nullable();
            $table->string('visiting_area')->nullable();
             $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('visit_purpose_id')->nullable();
            $table->integer('visitor_type_id')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->integer('visitor_id')->nullable();
            $table->string('remarks')->nullable();
             $table->string('image')->nullable();
             $table->string('qr_code')->nullable();
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
        Schema::dropIfExists('visits');
    }
}
