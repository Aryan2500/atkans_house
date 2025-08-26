<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::insert([
            [
                'title' => 'Atkans Walk 2025',
                'subtitle' => "Where India's Next Icons Are Born",
                'start_date' => Carbon::create(2025, 10, 18),
                'end_date' => Carbon::create(2025, 10, 19),
                'location' => 'Delhi',
                'venue_note' => 'Exact venue to be announced on 1st October',
                'hero_media_type' => 'video',
                'hero_media_url' => 'videos/atkans_walk_2024_highlights.mp4', // or use image path
                'cta_text' => 'Apply to Walk',
                'cta_link' => '/apply',
                'short_description' => 'India’s most unique runway experience where fashion, raw talent, and street culture collide. 2000 models. 100+ brands. One stage.',
                'brochure_url' => 'brochures/atkans_walk_2025.pdf',
                'registration_deadline' => Carbon::create(2025, 10, 5, 23, 59),
                'total_registered' => 1573,
                'disclaimer' => 'Only shortlisted applicants will be contacted.',

                // Stats
                'models_count' => '2000+',
                'brands_count' => '100+',
                'is_free_entry' => true,
                'has_media_coverage' => true,
                'has_on_site_hiring' => true,

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
