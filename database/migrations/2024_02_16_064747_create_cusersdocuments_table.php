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
        Schema::create('cusersdocuments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('cusers');
            $table->foreignId('document_id')->references('id')->on('cdocuments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cusersdocuments');
    }
};
