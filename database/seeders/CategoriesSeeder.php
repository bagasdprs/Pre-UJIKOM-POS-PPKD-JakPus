<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::insert([
            [
                'category_name' => 'Foods',
            ],
            [
                'category_name' => 'Drinks',
            ],
            [
                'category_name' => 'Snacks',
            ]
        ]);
    }
}
