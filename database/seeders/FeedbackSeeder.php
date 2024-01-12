<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feedback')->insert(
            [
                [
                    'id' => Str::uuid()->toString(),
                    'name' => 'John Doe',
                    'email' => 'johndoe76@gmail.com',
                    'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit perspiciatis laboriosam dolorum quisquam magni earum tempora eaque modi dolor harum alias autem quas a ipsum, ipsa sed error mollitia sunt.",
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ],
                [
                    'id' => Str::uuid()->toString(),
                    'name' => 'Kevin Smith',
                    'email' => 'kevinsmith78@gmail.com',
                    'content' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit perspiciatis laboriosam dolorum quisquam magni earum tempora eaque modi dolor harum alias autem quas a ipsum, ipsa sed error mollitia sunt.",
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
