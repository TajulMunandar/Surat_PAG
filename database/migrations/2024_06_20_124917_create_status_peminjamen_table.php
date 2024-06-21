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
        Schema::create('status_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->date('request_by');
            $table->string('fungsi');
            $table->string('it_recommendation');
            $table->text('reason');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->date('assigned_to');
            $table->tinyInteger('priority');
            $table->text('action');
            $table->foreignId('surat_id')->constrained('surats')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_peminjamen');
    }
};
