<?php

namespace Database\Seeders;

use App\Enums\CategoryStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                [
                    'id' => Str::uuid()->toString(),
                    'name' => "Lorem",
                    'meta_title' => "Lorem",
                    'description' => "This is just an example.",
                    'meta_description' => "This is just an example",
                    'status' => CategoryStatus::ACTIVE,
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ],
                [
                    'id' => Str::uuid()->toString(),
                    'name' => "Ipsum",
                    'meta_title' => "Ipsum",
                    'description' => "This is just an example.",
                    'meta_description' => "This is just an example.",
                    'status' => CategoryStatus::ACTIVE,
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
