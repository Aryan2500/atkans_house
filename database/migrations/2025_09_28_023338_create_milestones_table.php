<?php

use App\Models\Event;
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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name');
            $table->string('rule_type'); // safer than enum
            // Value to compare against (e.g. 2000, 18, etc.)
            $table->string('value')->nullable()->default(null);

            // Operator (=, >=, <=, etc.)
            $table->string('operator')->default('=');

            $table->foreignIdFor(Event::class)->nullable()->onDelete('null')->default(
                null
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
