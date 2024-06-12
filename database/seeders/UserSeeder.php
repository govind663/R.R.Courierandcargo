<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'name' => 'Admin',
            'user_type' => '1',
            'email' => 'admin@gmail.com',
            'mobile_no' => '1234567890',
            'password' => Hash::make('Suresh@12'),
            'created_by' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
