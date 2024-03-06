<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tasks")->insert([
            "name" => "Задание 1",
            "description" => "Описание",
            "end_date" => Carbon::now(),
            "status_id" => 1,
        ]);
        DB::table("tasks")->insert([
            "name" => "Задание 2",
            "description" => "Описание",
            "end_date" => Carbon::now()->addDay(),
            "status_id" => 2,
        ]);
    }
}
