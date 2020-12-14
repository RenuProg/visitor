<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('visit_no')->nullable();
            $table->string('name')->nullable();
            $table->date('visit_date')->nullable();
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('visit_purpose_id')->nullable();
            $table->integer('visitor_type_id')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->enum('status', array('0', '1'))->default('0');
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
        Schema::dropIfExists('visit_management');
    }
}
