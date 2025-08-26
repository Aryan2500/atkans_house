<?php

use App\Models\ModelProfile;
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
        Schema::create('hire_requests', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_email');
            $table->double('client_phone');
            $table->text('shoot_info')->nullable();
            $table->foreignIdFor(ModelProfile::class)->constrained()->onDelete('cascade');
            $table->string('location');
            $table->string('shoot_type');
            $table->string('scheduled_date');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hire_requests');
    }
};
