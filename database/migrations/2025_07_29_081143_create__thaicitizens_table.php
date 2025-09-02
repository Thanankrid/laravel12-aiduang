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
        Schema::create('Thaicitizens', function (Blueprint $table) {
            $table->id();
            $table->text('address_description')->nullable();
            $table->string('country')->nullable();
            $table->integer('citizen_number')->nullable();
            $table->float('income_level')->nullable();
            $table->string('occupation_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Thaicitizens');
    }
};
