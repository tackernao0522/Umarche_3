<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'Owner1',
                'email' => 'takaproject777@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
            ],
            [
                'name' => 'Owner2',
                'email' => 'takaki_5573031@yahoo.co.jp',
                'password' => Hash::make('password123'),
                'created_at' => now(),
            ],
            [
                'name' => 'Owner3',
                'email' => 'takaki_5573@hotmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
            ],
        ]);
    }
}
