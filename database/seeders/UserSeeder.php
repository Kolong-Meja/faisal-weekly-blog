<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                    'role_id' => DB::table('roles')->pluck('id')[0],
                    'username' => 'admin78',
                    'name' => 'Admin',
                    'email' => 'admin78@example.com',
                    'email_verified_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'password' => Hash::make('Admin78#'),
                    'status' => UserStatus::OFFLINE,
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s') 
                ],
                [
                    'id' => Str::uuid()->toString(),
                    'role_id' => DB::table('roles')->pluck('id')[1],
                    'username' => 'faisalramadhan0478_faisalweekly',
                    'name' => 'Faisal Ramadhan',
                    'email' => 'faisalramadhan1299@gmail.com',
                    'email_verified_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'password' => Hash::make('Faisal0478#'),
                    'status' => UserStatus::OFFLINE,
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s') 
                ],
            ]
        );
    }
}
