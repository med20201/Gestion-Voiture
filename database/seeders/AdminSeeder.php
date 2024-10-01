<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'gang',
            'email' => 'jamae.mezouak@gmail.com',
            'password' => bcrypt('12345678'),
            'phone'=>'0623300098',
            'ville'=>'tetouan',
            'admin'=>1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),

        ]);
    }
}
