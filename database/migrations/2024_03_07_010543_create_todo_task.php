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
        Schema::create('todo_task', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('user_task');
            $table->string('status')->nullable();
            $table->string('process')->nullable();
            $table->string('imp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_task');
    }
};
