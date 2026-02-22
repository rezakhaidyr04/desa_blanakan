<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->enum('type', ['pendapatan', 'belanja', 'pembiayaan']);
            $table->string('category');          // e.g. "Dana Desa", "Bidang Pembangunan"
            $table->string('item');              // e.g. "Dana Desa dari APBN"
            $table->bigInteger('budget');        // anggaran (Rp)
            $table->bigInteger('realization')->nullable(); // realisasi (Rp)
            $table->text('notes')->nullable();
            $table->unsignedSmallInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
