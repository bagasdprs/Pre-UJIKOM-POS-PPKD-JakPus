<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::insert([
            [
                'name' => 'Foods',
                'price' => 10000,
                'stock' => 100,
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Drinks',
                'price' => 8000,
                'stock' => 100,
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Snacks',
                'price' => 5000,
                'stock' => 100,
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'Foods',
            // ],
            // [
            //     'name' => 'Drinks',
            // ],
            // [
            //     'name' => 'Snacks',
            // ],
        ]);
        // $products = [
        //     [
        //         "name" => "Beef Burger",
        //         "price" => 45000,
        //         "img" => "img/beef-burger.png",
        //     ],
        //     [
        //         "name" => "Sandwich",
        //         "price" => 32000,
        //         "img" => "img/sandwich.png",
        //     ],
        //     [
        //         "name" => "Sawarma",
        //         "price" => 30000,
        //         "img" => "img/sawarma.png",
        //     ],
        //     [
        //         "name" => "Croissant",
        //         "price" => 16000,
        //         "img" => "img/croissant.png",
        //     ],
        //     [
        //         "name" => "Cinnamon Roll",
        //         "price" => 20000,
        //         "img" => "img/cinnamon-roll.png",
        //     ],
        //     [
        //         "name" => "Choco Glaze Donut with Peanut",
        //         "price" => 10000,
        //         "img" => "img/choco-glaze-donut-peanut.png",
        //     ],
        //     [
        //         "name" => "Choco Glazed Donut",
        //         "price" => 10000,
        //         "img" => "img/choco-glaze-donut.png",
        //     ],
        //     [
        //         "name" => "Red Glazed Donut",
        //         "price" => 10000,
        //         "img" => "img/red-glaze-donut.png",
        //     ],
        //     [
        //         "name" => "Iced Coffee Latte",
        //         "price" => 25000,
        //         "img" => "img/coffee-latte.png",
        //     ],
        //     [
        //         "name" => "Iced Chocolate",
        //         "price" => 20000,
        //         "img" => "img/ice-chocolate.png",
        //     ],
        //     [
        //         "name" => "Iced Tea",
        //         "price" => 15000,
        //         "img" => "img/ice-tea.png",
        //     ],
        //     [
        //         "name" => "Iced Matcha Latte",
        //         "price" => 22000,
        //         "img" => "img/matcha-latte.png",
        //     ]
        // ];

        // DB::table('products')->insert($products);
    }
}
