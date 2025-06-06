<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('gender');
            $table->date('birthdate');
            $table->bigInteger('contactNo');
            $table->string('course');
            $table->string('year');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('students');
    }
};
