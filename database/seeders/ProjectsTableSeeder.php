<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\type;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph(4);
            $newProject->image = $faker->imageUrl(640, 480, 'technology');
            $newProject->type_id = rand(1, 24);
            $newProject->github_link = $faker->url();
            $newProject->status = $faker->randomElement(['In corso', 'Completato', 'In attesa']);
            $newProject->save();
        }
    }
}
