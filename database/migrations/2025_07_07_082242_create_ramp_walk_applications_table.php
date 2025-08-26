<?php

use App\Models\Event;
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
        Schema::create('ramp_walk_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ModelProfile::class)->constrained('models')->onDelete('cascade');
            $table->foreignIdFor(Event::class)->nullable()->constrained('events')->onDelete('set null');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramp_walk_applications');
    }
};
