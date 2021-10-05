<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('image')->default('/frontend/images/images.png');
            $table->string('phone');
            $table->string('address');
            $table->integer('gender')->default(1);
            $table->tinyInteger('role_id')->default(3);
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    //1 Admin
    //2 Owner
    //3 User
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
