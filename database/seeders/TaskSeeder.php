<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Task::truncate();

        $csvFile = fopen(base_path("database/data/tasks.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Task::create([
                    "name" => $data['0'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
