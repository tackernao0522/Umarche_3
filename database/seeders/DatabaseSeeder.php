<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

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
            OwnersTableSeeder::class,
            AdminTableSeeder::class,
            ShopsTableSeeder::class,
            ImagesTableSeeder::class,
            CategoriesTableseeder::class,
            // ProductsTableSeeder::class,
            // StocksTableSeeder::class,
            UsersTableSeeder::class,
        ]);
        Stock::factory(100)->create();
        // \App\Models\User::factory(10)->create();
    }
}
