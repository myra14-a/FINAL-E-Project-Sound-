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
        Schema::create('contactdetails', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notnull();
            $table->string('email')->unique();
             $table->string('reason')->notnull();
             $table->string('comment')->notnull();
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactdetails');
    }
};
