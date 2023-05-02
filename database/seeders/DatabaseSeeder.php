<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Author::create([
            'name' => 'Sayar Bo',
        ]);

        Author::create([
            'name' => 'Saw Kyi Phyu'
        ]);

        $this->call(RoleAndPermissionSeeder::class);
        $this->call(AdminSeeder::class);

        // Blog::factory()->count(20)->create();
    }
}
