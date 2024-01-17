<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProducttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producttypes')->insert([
            'name' => 'Gaz',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('producttypes')->insert([
            'name' => 'Lubrifiant',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('producttypes')->insert([
            'name' => 'Pétrole',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('producttypes')->insert([
            'name' => 'Super',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('producttypes')->insert([
            'name' => 'Gazoil',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
