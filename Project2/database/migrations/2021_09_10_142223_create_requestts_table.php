<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequesttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestt', function (Blueprint $table) {
            $table->id();
            $table->string('dept_id',10);
            $table->foreign('dept_id')->references('id')->on('department');
            $table->string('student_id',10);
            $table->foreign('student_id')->references('id')->on('student');
            $table->string('req_title',255);
            $table->text('req_content');
            $table->text('note');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('requestts');
    }
}
