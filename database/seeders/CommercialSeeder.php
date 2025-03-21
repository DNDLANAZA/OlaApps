<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommercialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commercials')->insert([
            'name' => 'commercial',
            'email' => 'commercial@gmail.com',
            'password' => 'commercialpasse',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
