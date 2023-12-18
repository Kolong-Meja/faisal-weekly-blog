<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert(
            [
                [
                    'id' => Str::uuid()->toString(),
                    'image' => 'testing.jpg',
                    'owner' => 'Kevin James',
                    'url' => Str::random(30),
                ],
            ]
        );
    }
}