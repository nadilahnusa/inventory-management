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
            ['name' => 'Laptop', 'description' => 'Portable computing devices'],
            ['name' => 'Printer', 'description' => 'Printing and document solutions'],
            ['name' => 'Monitor', 'description' => 'Display and visual equipment'],
            ['name' => 'Networking', 'description' => 'Network infrastructure and communication devices'],
            ['name' => 'Accessories', 'description' => 'Peripheral and supporting equipment'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                [
                    'description' => $category['description'],
                ],
            );
        }
    }
}
