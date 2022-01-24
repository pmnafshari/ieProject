<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::query()->create([
            'role_id' => Role::query()->where('title', 'mainAdmin')->first()->id,
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('123456'),
            'mobile' => '09119286499',
            'ncode' => '',
            'date_of_birth' => null,
            'degree' => '',
            'file' => '',
            'marital_status' => null,
            'marriage_date' => null,
            'gender' => null,
            'child_status' => null,
            'address' => '',


        ]);


        $adminUser = User::query()->create([
            'role_id' => Role::query()->where('title', 'user')->first()->id,
            'firstname' => 'user',
            'lastname' => 'userTest',
            'email' => 'user@user',
            'password' => bcrypt('147147'),
            'mobile' => '09111232211',
            'ncode' => 'userNcode',
            'date_of_birth' => null,
            'degree' => '',
            'file' => '',
            'marital_status' => null,
            'marriage_date' => null,
            'gender' => null,
            'child_status' => null,
            'address' => '',


        ]);
    }
}
