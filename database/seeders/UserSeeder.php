<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->getUsers() as $userData)
        {
            User::updateOrCreate([
                'email' => $userData['email']   
            ], $userData);
        }
    }

    private function getUsers() {
        return [
            [
                'name' => 'Richard Marcell',
                'email' => 'richard@gmail.com',
                'password' => Hash::make('nasigoreng123'),
            ]
        ];
    }
}
