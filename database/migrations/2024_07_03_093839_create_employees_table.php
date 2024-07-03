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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('empID');
            $table->string('fName', 30);
            $table->string('lName', 30);
            $table->string('email', 80);
            $table->string('phoneNo', 20);
            $table->longText('address');
            $table->date('DOB');
            $table->float('salary');
            $table->string('Department');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
