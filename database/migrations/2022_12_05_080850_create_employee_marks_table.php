<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_marks', function (Blueprint $table) {
            $table->id('mark_id');
            $table->string('employee_id');
            $table->string('mark1');
            $table->string('mark2');
            $table->string('mark3');
            $table->string('mark4');
            $table->string('mark5');
            $table->string('pratical_mark1');
            $table->string('pratical_mark2');
            $table->string('pratical_mark3');
            $table->string('presentage');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_marks');
    }
};
