<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article_categories')->insert(
            [
                [
                    'id' => 1,
                    'article_id' => DB::table('articles')->pluck('id')[0],
                    'category_id' => DB::table('categories')->pluck('id')[0],
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ],
                [
                    'id' => 2,
                    'article_id' => DB::table('articles')->pluck('id')[1],
                    'category_id' => DB::table('categories')->pluck('id')[1],
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
