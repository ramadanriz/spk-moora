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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('student_id_number')->primary();
            $table->string('name', 60);
            $table->string('class', 60);
            $table->string('major', 60);
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->integer('knowledge')->nullable();
            $table->integer('interview')->nullable();
            $table->integer('pbb')->nullable();
            $table->integer('physical')->nullable();
            $table->integer('absent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
