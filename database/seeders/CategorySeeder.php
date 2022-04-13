<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'Toxinas',
                'slug' => 'toxinas',
                'category_code' => 'T',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Preenchedores',
                'slug' => 'preenchedores',
                'category_code' => 'P',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bioestimuladores',
                'slug' => 'bioestimuladores',
                'category_code' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fios',
                'slug' => 'fios',
                'category_code' => 'F',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Linha de mesoterapia',
                'slug' => 'linha-de-mesoterapia',
                'category_code' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
