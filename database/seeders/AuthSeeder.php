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
                    'email' => 'admin@admin.com',
                    'password' => '$2y$10$i7EtgcGCli/1pKuA3ZUsAeb5BR8/e9jcRRhcQruK8ImL4Q.ywRC66',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
    }
}
