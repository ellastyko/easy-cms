<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Enum\Role as RoleEnum;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (RoleEnum::all() as $name) {
            Role::updateOrCreate([
                'name' => $name,
            ]);
        }
    }
}
