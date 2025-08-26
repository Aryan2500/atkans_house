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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            // User-submitted fields
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message')->nullable();
            $table->string('ip_address')->nullable();

            // Admin-side tracking
            $table->boolean('is_viewed')->default(false);
            $table->timestamp('responded_at')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['new', 'in_progress', 'closed'])->default('new'); // e.g. new, in_progress, closed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
