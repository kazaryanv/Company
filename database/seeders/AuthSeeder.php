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
                    'password' => '$2y$10$zLKDlFBH5JzRhQQV1DPzDOak.6HDXhQr9.c9hOzE1SIe7HwmsiPw6',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
    }
}
