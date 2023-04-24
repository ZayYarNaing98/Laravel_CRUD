<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Sir',
            'email'=> 'sir@gmail.com',
            'password' => Hash::make('password')
        ]);

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('password')
        ]);

        $admin -> assignRole('SuperAdmin');
        $editor -> assignRole('Editor');



    }
}
