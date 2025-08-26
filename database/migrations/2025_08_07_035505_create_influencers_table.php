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
        Schema::create('influencers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instagram_profile')->nullable();
            $table->string('followers')->nullable();
            $table->string('other_social_media')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('interested_product')->nullable();
            $table->boolean('status')->default(true); // true = active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencers');
    }
};
