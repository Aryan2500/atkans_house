<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            ['name' => 'XS', 'number' => 34],
            ['name' => 'S',  'number' => 36],
            ['name' => 'M',  'number' => 38],
            ['name' => 'L',  'number' => 40],
            ['name' => 'XL', 'number' => 42],
            ['name' => 'XXL', 'number' => 44],
        ];

        foreach ($sizes as $size) {
            Size::updateOrCreate(
                ['name' => $size['name']],
                ['number' => $size['number']]
            );
        }
    }
}
