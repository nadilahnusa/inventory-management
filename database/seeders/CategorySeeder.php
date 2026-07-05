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
            ['name' => 'Laptop', 'description' => 'Portable computing devices', 'is_active' => true],
            ['name' => 'Printer', 'description' => 'Printing and document solutions', 'is_active' => true],
            ['name' => 'Monitor', 'description' => 'Display and visual equipment', 'is_active' => true],
            ['name' => 'Networking', 'description' => 'Network infrastructure and communication devices', 'is_active' => true],
            ['name' => 'Accessories', 'description' => 'Peripheral and supporting equipment', 'is_active' => true],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                [
                    'description' => $category['description'],
                    'is_active' => $category['is_active'],
                ],
            );
        }
    }
}
