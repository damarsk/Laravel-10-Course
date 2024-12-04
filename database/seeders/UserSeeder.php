<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            [
                'username'=>'admin',
                'name'=>'AkunAdmin',
                'email'=>'admin@gmail.com',
                'level'=>'admin',
                'password'=>Hash::make('123456'),
                'email_verified_at'=>now(),
            ],
            [
                'username'=>'damar',
                'name'=>'Damar Syahada',
                'email'=>'damar@gmail.com',
                'level'=>'user',
                'password'=>Hash::make('damar123'),
                'email_verified_at'=>now(),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}