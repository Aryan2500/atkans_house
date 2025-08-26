<?php

namespace Database\Seeders;

use App\Models\Sponsershiptype;
use App\Models\SponsorshipType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorshipTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Booth Partner',
            'Brand Merchandise in Event',
            'Runway Sponsorship',
            'Contest / Prize Sponsor',
            'Hiring Talent / Brand Ambassadors',
            'Just Promotion, No Stall',
            'Unsure – Want to Discuss',
        ];

        foreach ($types as $type) {
            SponsorshipType::create([
                'name' => $type
            ]);
        }
    }
}
