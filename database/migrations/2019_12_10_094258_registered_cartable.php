<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisteredCartable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('registered_car', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('car_id');
            $table->string('price');
            $table->string('car_no');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('duration');
            $table->integer('payment');
            $table->integer('collect_type')->nullable();
            $table->integer('status')->default(1);
            $table->integer('total_amount')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('registered_car');
    }
}
