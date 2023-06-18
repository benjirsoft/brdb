<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            $data = [

            [
               'name' => 'ShowroomIncharge',
               'email' => 'showroom@gmail.com',
               'password' => bcrypt('showroom2025'),
               'role' => 'showroomincharge'                  
           ],

        ];

        foreach ($data as $users) {
            User::create($users);
        }

    }
}
