<?php

namespace Database\Seeders;

use App\Enums\RoleStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(
            [
                [
                    'id' => Str::uuid()->toString(),
                    'title' => 'admin',
                    'description' => 'This is role admin',
                    'abilities' => 'create, view, edit, delete',
                    'status' => RoleStatus::ACTIVE,
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ],
                [
                    'id' => Str::uuid()->toString(),
                    'title' => 'super admin',
                    'description' => 'This is role super admin',
                    'abilites' => 'create, view, edit, delete',
                    'status' => RoleStatus::ACTIVE,
                    'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
