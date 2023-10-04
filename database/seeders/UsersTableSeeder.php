<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'User1',
                'email' => 'cheap_trick_magic@yahoo.co.jp',
                'password' => Hash::make('password123'),
                'created_at' => now(),
            ]
        ]);
    }
}
