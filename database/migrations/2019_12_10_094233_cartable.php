<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cartable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('car', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('brand_id');
            $table->integer('cartype_id');
            $table->integer('user_id');
            $table->string('color');
            $table->integer('wheels');
            $table->integer('doors');
            $table->integer('mile_list');
            $table->integer('model');
            $table->integer('seat');
            $table->string('transmission');
            $table->integer('fuel');
            $table->string('grade');
            $table->string('price');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->string('car_no')->unique();
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
        Schema::dropIfExists('car');
    }
}
