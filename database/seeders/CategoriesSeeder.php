<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cats = ['Education', 'Technology', 'Travel'];
        foreach($cats as $cat){
            Category::create(
                ["name" => $cat]
            );
        }
    }
}
