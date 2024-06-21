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
        Schema::create('informasi_umum_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemakai');
            $table->string('no_pegawai');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
            $table->string('jabatan');
            $table->string('unit_kerja');
            $table->string('no_telpon');
            $table->foreignId('divisi_id')->constrained('divisis')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('surat_id')->constrained('surats')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_umum_peminjamen');
    }
};
