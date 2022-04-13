<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Toxinas
        for ($i = 1; $i <= 12; $i++) {
            $category = Category::find(1);
            Product::create([
                'name' => 'Toxina'.$i,
                'slug' => 'toxina-'.$i,
                'details' => 'toxina\'s hodie',
                'description' => 'Lorem '. $i .'Ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in?',
                'product_code' => $category->category_code. '-00' .$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ])->categories()->attach($category);
        }

        //Preenchedores
        for ($i = 1; $i <= 12; $i++) {
            $category = Category::find(2);
            Product::create([
                'name' => 'Preenchedores'.$i,
                'slug' => 'preenchedores-'.$i,
                'details' => 'preenchedores\'s hodie',
                'description' => 'Lorem '. $i .'Ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in?',
                'product_code' => $category->category_code. '-00' .$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ])->categories()->attach($category);
        }

        //Bioestimuladores
        for ($i = 1; $i <= 12; $i++) {
            $category = Category::find(3);
            Product::create([
                'name' => 'Bioestimuladores'.$i,
                'slug' => 'bioestimuladores-'.$i,
                'details' => 'bioestimuladores\'s hodie',
                'description' => 'Lorem '. $i .'Ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in?',
                'product_code' => $category->category_code. '-00' .$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ])->categories()->attach($category);
        }

        //Fios
        for ($i = 1; $i <= 12; $i++) {
            $category = Category::find(4);
            Product::create([
                'name' => 'Fios'.$i,
                'slug' => 'fios-'.$i,
                'details' => 'fios\'s hodie',
                'description' => 'Lorem '. $i .'Ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in?',
                'product_code' => $category->category_code. '-00' .$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ])->categories()->attach($category);
        }

        //Linha de mesoterapia
        for ($i = 1; $i <= 12; $i++) {
            $category = Category::find(5);
            Product::create([
                'name' => 'Linha de mesoterapia'.$i,
                'slug' => 'linha-de-mesoterapia-'.$i,
                'details' => 'linha-de-mesoterapia\'s hodie',
                'description' => 'Lorem '. $i .'Ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in?',
                'product_code' => $category->category_code. '-00' .$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ])->categories()->attach($category);
        }
    }
}
