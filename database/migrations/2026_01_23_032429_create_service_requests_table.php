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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('service_type'); // ektp, kk, akta, skck, dll
            $table->string('name');
            $table->string('nik', 16);
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('address');
            $table->text('purpose')->nullable(); // untuk SKCK
            $table->json('documents')->nullable(); // menyimpan path dokumen yang diupload
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'rejected'])->default('processing');
            $table->text('admin_notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
