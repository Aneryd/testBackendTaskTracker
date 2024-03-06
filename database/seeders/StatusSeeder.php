<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statuses")->insert([
            "name" => "Очередь"
        ]);
        DB::table("statuses")->insert([
            "name" => "Разработка"
        ]);
        DB::table("statuses")->insert([
            "name" => "Тестирование"
        ]);
        DB::table("statuses")->insert([
            "name" => "Завершено"
        ]);
    }
}
