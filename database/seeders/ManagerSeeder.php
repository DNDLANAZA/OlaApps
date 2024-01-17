<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->insert([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => '12345678',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
