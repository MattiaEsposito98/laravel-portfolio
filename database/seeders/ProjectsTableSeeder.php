<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            $newProject->technologies = json_encode($faker->randomElements(['Laravel', 'Vue.js', 'React', 'Node.js', 'PHP', 'MySQL'], 2));
            $newProject->type = $faker->sentence(1);
            $newProject->github_link = $faker->url();
            $newProject->status = $faker->randomElement(['In corso', 'Completato', 'In attesa']);
            $newProject->save();
        }
    }
}
