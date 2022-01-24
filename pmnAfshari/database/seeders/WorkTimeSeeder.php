<?php

namespace Database\Seeders;

use App\Models\WorkTime;
use Illuminate\Database\Seeder;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rules = WorkTime::query()->create([
            'start' => '08:15',
            'end' => '20:00',
        ]);
    }
}
