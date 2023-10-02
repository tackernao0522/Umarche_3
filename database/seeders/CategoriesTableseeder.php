<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'シャツ',
                'sort_order' => '1',
                'created_at' => now(),
            ],
            [
                'name' => '靴',
                'sort_order' => '2',
                'created_at' => now(),
            ],
            [
                'name' => 'ベビー服',
                'sort_order' => '3',
                'created_at' => now(),
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'primary_category_id' => 1,
                'name' => 'Tシャツ',
                'sort_order' => 1,
                'created_at' => now(),
            ],
            [
                'primary_category_id' => 1,
                'name' => 'パンプス',
                'sort_order' => 2,
                'created_at' => now(),
            ],
            [
                'primary_category_id' => 1,
                'name' => 'トップス',
                'sort_order' => 3,
                'created_at' => now(),
            ],
            [
                'primary_category_id' => 2,
                'name' => 'バッグ',
                'sort_order' => 4,
                'created_at' => now(),
            ],
            [
                'primary_category_id' => 2,
                'name' => 'スーツ',
                'sort_order' => 5,
                'created_at' => now(),
            ],
            [
                'primary_category_id' => 2,
                'name' => 'ケーキ',
                'sort_order' => 6,
                'created_at' => now(),
            ],
        ]);
    }
}
