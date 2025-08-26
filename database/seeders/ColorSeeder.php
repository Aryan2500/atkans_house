<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            ['name' => 'Red',    'hex_code' => '#FF0000'],
            ['name' => 'Green',  'hex_code' => '#00FF00'],
            ['name' => 'Blue',   'hex_code' => '#0000FF'],
            ['name' => 'Black',  'hex_code' => '#000000'],
            ['name' => 'White',  'hex_code' => '#FFFFFF'],
            ['name' => 'Yellow', 'hex_code' => '#FFFF00'],
        ];

        foreach ($colors as $color) {
            Color::updateOrCreate(
                ['name' => $color['name']],
                ['hex_code' => $color['hex_code']]
            );
        }
    }
}
