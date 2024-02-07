<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name' => 'ygy',
                'email' => 'ygy@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345678')
            ]
        ];

        foreach($userdata as $key => $val){
            User::create($val);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}