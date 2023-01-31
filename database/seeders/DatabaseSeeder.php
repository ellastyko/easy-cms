<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
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
        \App\Models\User::factory()
        ->has(Article::factory()->count(10))
        ->create(
            [
                'name' => 'Author',
                'email' => 'author@example.com',
            ]
        );

        \App\Models\User::factory()
        ->create(
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ]
        );
    }
}
