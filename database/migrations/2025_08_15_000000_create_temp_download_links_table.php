<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('temp_download_links', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->string('file_path');
            $table->unsignedInteger('max_downloads')->default(1);
            $table->unsignedInteger('download_count')->default(0);
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temp_download_links');
    }
};