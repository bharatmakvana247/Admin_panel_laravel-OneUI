<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'SuperAdmin',
            'image' => 'default.png'
        ]);
    }
}