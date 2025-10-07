<?php

use App\Models\Event;
use App\Models\OnboardImages;
use App\Models\Participation;
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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Event::class, 'event_id')->constrained('events')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'voter_id')->constrained('users')->onDelete('cascade');

            $table->foreignIdFor(Participation::class)->constrained('participations')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
