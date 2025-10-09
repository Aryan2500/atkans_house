<?php

use App\Models\User;
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
        Schema::create('login_logs', function (Blueprint $table) {
            $table->id();

            // 🔗 Relation to users table
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            
            // 📅 Login & logout timestamps
            $table->timestamp('login_at')->nullable();
            $table->timestamp('logout_at')->nullable();

            // 🌐 Network info
            $table->string('ip_address', 45)->nullable(); // IPv4 & IPv6 support
            $table->string('user_agent')->nullable(); // Browser/device info
            $table->string('device')->nullable(); // Device name or type
            $table->string('os')->nullable(); // Operating System
            $table->string('browser')->nullable(); // Browser name/version


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_logs');
    }
};
