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
        Schema::create('cdocument_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->nullable(false)
                ->references('id')->on('cdocuments')->onDelete('cascade');
            $table->string('name');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cdocument_histories');
    }
};
