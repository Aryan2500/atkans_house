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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('otp');
            // The user identifier: email or phone
            $table->string('contact'); // email or phone
            // OTP type: 'email' or 'phone' (optional, but useful)
            $table->enum('type', ['email', 'phone'])->nullable();

            // Expiration time
            $table->timestamp('expires_at');
            // Verification status
            $table->boolean('verified')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
