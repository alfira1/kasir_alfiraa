<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 100);
            $table->string('jenjang_id', 200)->nullable();
            $table->string('jurusan_id', 200)->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamp('created_at', 6)->nullable();
            $table->timestamp('updated_at', 6)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};

