<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Role;
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
        $this->call([RoleSeeder::class]);

        \App\Models\User::factory(2)
        ->has(Article::factory()->count(10))
        ->sequence(
            ['email' => 'author1@example.com'],
            ['email' => 'author2@example.com']
        )
        ->create()
        ->each(fn ($user) =>  $user->assignRole('author'));

        $admin = \App\Models\User::factory()
        ->create(
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ]
        );
        $admin->assignRole('admin');
    }
}
