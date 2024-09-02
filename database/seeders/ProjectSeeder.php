<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $count = 5;

        for ($i = 1; $i <= $count; $i++) {
            Project::updateOrCreate(
                ['name' => 'project ' . $i], 
                ['name' => 'project ' . $i]  
            );
        }
    }
}
