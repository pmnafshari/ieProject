<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
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
        $mainAdmin = Role::query()->create([
            'title' => 'mainAdmin',
            'label'=>'ادمین اصلی'
        ]);

        $admin = Role::query()->create([
            'title' => 'admin',
            'label'=>'ادمین'
        ]);



        Role::query()->insert([
            'title' => 'user',
            'label'=>'کاربر'
        ]);
        $admin->permissions()->attach(Permission::all());

    }
}
