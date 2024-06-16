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
        Schema::create('uraians', function (Blueprint $table) {
            $table->id();
            $table->string('langkah_kerja');
            $table->string('bahaya_kecelakaan');
            $table->string('tindakan_pencegahan');
            $table->foreignId('surat_id')->constrained('surats')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uraians');
    }
};
