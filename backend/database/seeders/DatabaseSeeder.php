<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $techs = Technology::factory()->count(10)->create();

        Project::factory()->count(20)->create()->each(function ($project) use ($techs) {
            $project->technologies()->attach(
                $techs->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
