<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_types')->insert([
            ['title' => 'Complaint'],
            ['title' => 'Project'],
            ['title' => 'Remote'],
            ['title' => 'Support'],
        ]);
    }
}
