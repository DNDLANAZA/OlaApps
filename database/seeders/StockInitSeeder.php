<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockInitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock_inits')->insert([
            'gaz' => 0,
            'gazoil' => 0,
            'lubrifiant' => 0,
            'petrole' => 0,
            'super' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]); 
    }
}
