<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('source')->nullable(); // ✅ เพิ่มคอลัมน์ source
            $table->string('image')->nullable();  // เก็บชื่อไฟล์รูป
            $table->timestamps();
        });
    }

    

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
