<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ManagerSeeder::class,
            CommercialSeeder::class,
            ProducttypeSeeder::class,
            StockInitSeeder::class,
            RoleSeeder::class,
            UserRoleSeeder::class,
            // StockInit::class,
            // ProductSeeder::class,
        ]);
        \App\Models\Manager::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
         ]);
    }
}
