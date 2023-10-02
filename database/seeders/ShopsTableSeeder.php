<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => '店名が入ります',
                'information' => '店舗情報が入ります。店舗情報が入ります。店舗情報が入ります。',
                'filename' => '',
                'is_selling' => true,
                'created_at' => now(),
            ],
            [
                'owner_id' => 2,
                'name' => '店名が入ります',
                'information' => '店舗情報が入ります。店舗情報が入ります。店舗情報が入ります。',
                'filename' => '',
                'is_selling' => true,
                'created_at' => now(),
            ],
        ]);
    }
}
