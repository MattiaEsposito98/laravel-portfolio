<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = [
            'Sito Web Statico',
            'E-commerce',
            'Web App',
            'Mobile App',
            'Software Gestionale',
            'API / Backend',
            'Landing Page',
            'Portfolio Personale',
            'Dashboard Amministrativa',
            'Blog',
            'Forum',
            'Social Network',
            'CRM (Customer Relationship Management)',
            'ERP (Enterprise Resource Planning)',
            'Progetto Open Source',
            'Plugin / Estensione',
            'Tema WordPress',
            'Bot / Automazione',
            'Game Development',
            'Strumento di Data Analysis',
            'Machine Learning / AI',
            'IoT (Internet of Things)',
            'Cybersecurity Tool'
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->description = $faker->sentence();
            $newType->save();
        }
    }
}
