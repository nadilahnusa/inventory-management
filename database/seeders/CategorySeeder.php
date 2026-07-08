<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Laptop',
                'description' => 'Portable computers for office operations',
            ],

            [
                'name' => 'Projector',
                'description' => 'Presentation and meeting equipment',
            ],

            [
                'name' => 'Printer',
                'description' => 'Printing and document devices',
            ],

            [
                'name' => 'Monitor',
                'description' => 'Computer display devices',
            ],

            [
                'name' => 'Networking',
                'description' => 'Network infrastructure and communication devices',
            ],

            [
                'name' => 'Peripheral',
                'description' => 'Computer peripherals and accessories',
            ],

            [
                'name' => 'Office Equipment',
                'description' => 'Office supporting equipment',
            ],

            [
                'name' => 'Furniture',
                'description' => 'Office furniture and meeting equipment',
            ],

        ];

        foreach ($categories as $category) {

            Category::firstOrCreate(
                [
                    'name' => $category['name'],
                ],
                [
                    'description' => $category['description'],
                ]
            );

        }
    }
}