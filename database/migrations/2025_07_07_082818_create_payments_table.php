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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_reference')->unique(); // Unique transaction ID
            $table->string('payer_name');
            $table->string('payer_email')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('payment_type', ['hire_request', 'sponsorship']);
            $table->unsignedBigInteger('related_id'); // ID of related model (hire_request_id or sponsorship_id)
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('method')->nullable(); // like 'razorpay', 'stripe', 'cash'
            $table->json('meta')->nullable(); // extra info
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
