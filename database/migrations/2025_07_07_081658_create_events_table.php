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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('title'); // "Atkans Walk 2025"
            $table->text('subtitle')->nullable(); // "Where India's Next Icons Are Born"
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location'); // "Delhi"
            $table->string('venue_note')->nullable(); // "Exact venue to be announced..."

            // Hero Media
            $table->string('hero_media_type')->default('image'); // image / video
            $table->string('hero_media_url');

            // Call to Action
            $table->string('cta_text')->default('Apply Now');
            $table->string('cta_link')->nullable();

            // Description & Brochure
            $table->text('short_description');
            $table->string('brochure_url')->nullable();

            // Countdown
            $table->dateTime('registration_deadline')->nullable();
            $table->integer('total_registered')->default(0);
            $table->text('disclaimer')->nullable(); // “Only shortlisted applicants...”

            // Stats (Combined from event_stats)
            $table->string('models_count')->nullable(); // e.g. "2000+"
            $table->string('brands_count')->nullable(); // e.g. "100+"
            $table->boolean('is_free_entry')->default(true);
            $table->boolean('show_on_rampwalk_registration')->default(false);

            $table->boolean('has_media_coverage')->default(true);
            $table->boolean('has_on_site_hiring')->default(true);
            $table->boolean('show_on_home_page')->default(false);

            $table->boolean('has_notified')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
