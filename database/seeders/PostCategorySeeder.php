<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_categories')->insert(
            [
                [
                    'id' => Str::uuid()->toString(),
                    'post_id' => DB::table('posts')->pluck('id')[0],
                    'category_id' => DB::table('categories')->pluck('id')[0],
                ],
            ]
        );
    }
}