<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'IT', 'description' => 'Information Technology department'],
            ['name' => 'Finance', 'description' => 'Finance and accounting department'],
            ['name' => 'Human Resource', 'description' => 'Human resources and administration'],
            ['name' => 'Marketing', 'description' => 'Sales and marketing operations'],
            ['name' => 'Warehouse', 'description' => 'Warehouse and logistics operations'],
        ];

        foreach ($departments as $department) {
            Department::firstOrCreate(
                ['name' => $department['name']],
                ['description' => $department['description']],
            );
        }
    }
}
