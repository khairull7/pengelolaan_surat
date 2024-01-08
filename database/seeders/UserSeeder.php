<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => \Ramsey\Uuid\Uuid::uuid4(),
                'name' => 'staff',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('staff'),
                'role' => 'Staff',

            ],
            [
                "id" => \Ramsey\Uuid\Uuid::uuid4(),
                'name' => 'guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('guru'),
                'role' => 'Guru',

            ],


        ];
        User::insert($data);
    }
}
