<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tasks')->insert([
            "task_name"=>"Công việc 1",
            "task_description"=>"Việc này đỉnh cấp lắm",
            "deadline"=>"2023/7/2",
            "priority"=>1,
            "id_project"=>1
        ]);
    }
}
