<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name"=> "Web Design",
            "slug"=> "Web-design",
            "color" =>'red'
        ]);
        Category::create([
            "name"=> "IOT",
            "slug"=> "iot",
            "color" =>'blue'
        ]);
        Category::create([
            "name"=> "Prosesor",
            "slug"=> "Prosesor",
            "color" =>'yellow'
        ]);
    }
}
