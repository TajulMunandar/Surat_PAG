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
        Schema::create('informasi_umums', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan');
            $table->string('tag_no');
            $table->string('lokasi_kerja');
            $table->string('dibuat_oleh');
            $table->string('nama');
            $table->string('seksi');
            $table->string('tanda_tangan');
            $table->string('nama_pengawas');
            $table->string('seksi_pengawas');
            $table->date('tanggal');
            $table->string('ttd_pengawas');
            $table->foreignId('surat_id')->constrained('surats')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_umums');
    }
};
