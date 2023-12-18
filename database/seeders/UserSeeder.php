<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'id' => Str::uuid()->toString(),
                    'name' => 'Faisal Ramadhan',
                    'email' => 'faisaldailyblog@gmail.com',
                    'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'password' => Hash::make('FaisalBlog0809#'),
                    'status' => 'offline',
                    'role' => 'super admin',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'id' => Str::uuid()->toString(),
                    'name' => 'Faisal Ramadhan',
                    'email' => 'faisaldailyblog8998@gmail.com',
                    'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'password' => Hash::make('FaisalBlogRecovery0809#'),
                    'status' => 'offline',
                    'role' => 'super admin',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
