<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'filename' => 'sample1.jpg',
                'title' => null,
                'created_at' => now(),
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample2.jpg',
                'title' => null,
                'created_at' => now(),
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample3.jpg',
                'title' => null,
                'created_at' => now(),
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample4.jpg',
                'title' => null,
                'created_at' => now(),
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample5.jpg',
                'title' => null,
                'created_at' => now(),
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample6.jpg',
                'title' => null,
                'created_at' => now(),
            ],
        ]);
    }
}
