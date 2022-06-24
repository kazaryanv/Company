<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table("users")->insert([
                    'name' => "jon",
                    'email' => 'company@mail.ru',
                    'password' => Hash::make('company'),
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
    }
}
