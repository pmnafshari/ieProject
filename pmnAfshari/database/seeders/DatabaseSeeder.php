<?php

namespace Database\Seeders;

use App\Models\Rule;
use App\Models\WorkTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {$this->call([
        PermissionSeeder::class,
        RoleSeeder::class,
        UserSeeder::class,
        RuleSeeder::class,
        WorkTimeSeeder::class
    ]);
    }
}