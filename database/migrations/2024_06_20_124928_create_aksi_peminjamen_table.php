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
        Schema::create('aksi_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('estimasi_kerja');
            $table->date('tanggal_mulai');
            $table->string('completed_by');
            $table->integer('expense_amount');
            $table->date('completion_date');
            $table->date('user_acceptance');
            $table->foreignId('surat_id')->constrained('surats')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aksi_peminjamen');
    }
};
