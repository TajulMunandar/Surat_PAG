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
        Schema::create('deskripsi_of_services', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->string('attachment');
            $table->string('justification');
            $table->foreignId('surat_id')->constrained('surats')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deskripsi_of_services');
    }
};
