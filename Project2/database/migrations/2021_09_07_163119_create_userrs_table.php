<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userr', function (Blueprint $table) {
            $table->string('id',10);
            $table->string('name',50);
            $table->date('dob');
            $table->string('phone',20)->unique();
            $table->tinyInteger('sex');
            $table->string('address',255);
            $table->string('dept_id',10);
            $table->foreign('dept_id')->references('id')->on('department');
            $table->tinyInteger('status');
            $table->string('email',255)->unique();
            $table->string('password',32);
            $table->string('image',255);
            $table->text('note');
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
        Schema::dropIfExists('userrs');
    }
}
