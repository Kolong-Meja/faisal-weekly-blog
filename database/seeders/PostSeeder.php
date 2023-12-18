<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert(
            [
                [
                    'id' => Str::uuid()->toString(),
                    'user_id' => DB::table('users')->pluck('id')[0],
                    'title' => 'testing',
                    'sub_title' => 'testing',
                    'meta_title' => 'testing',
                    'slug' => Str::slug('testing'),
                    'content' => 'halo ini adalah testing aja',
                    'keywords' => 'testing, aja',
                    'status' => 'not verified',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
