<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'name' => 'R. R. COURIER & CARGO',
            'email' => 'rrcourierandcargo1@gmail.com',
            'mobile_no' => '66662183',
            'address' => 'Shop No.2a, Emca Sadan, Appasaheb Marathe Marg, Prabhadevi, Mumbai - 400025',
            'gst_no'=> '4676776876',
            'inserted_by' => '1',
            'inserted_at' => Carbon::now(),
        ]);
    }
}
