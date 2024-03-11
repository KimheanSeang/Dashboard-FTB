<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recover', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('delete_by')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('uploaded_by')->nullable(); // Change to string type
            $table->timestamps(); // This line will add `created_at` and `updated_at` columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recover');
    }
};
