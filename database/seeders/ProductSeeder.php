<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        $products = [
            [
                'category' => 'Laptop',
                'code' => 'LT-001',
                'name' => 'HP EliteBook 840 G9',
                'description' => 'Business laptop for office productivity',
                'total_stock' => 8,
                'available_stock' => 7,
                'location' => 'IT Room A',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Laptop',
                'code' => 'LT-002',
                'name' => 'Dell Latitude 7430',
                'description' => 'Ultralight enterprise laptop',
                'total_stock' => 6,
                'available_stock' => 6,
                'location' => 'IT Room B',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Laptop',
                'code' => 'LT-003',
                'name' => 'Lenovo ThinkPad T14',
                'description' => 'Reliable workstation laptop',
                'total_stock' => 5,
                'available_stock' => 5,
                'location' => 'IT Room C',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Printer',
                'code' => 'PR-001',
                'name' => 'HP LaserJet Pro MFP 4301',
                'description' => 'Multi-function laser printer',
                'total_stock' => 4,
                'available_stock' => 4,
                'location' => 'Finance Office',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Printer',
                'code' => 'PR-002',
                'name' => 'Canon imageCLASS MF3010',
                'description' => 'Compact office printer',
                'total_stock' => 3,
                'available_stock' => 3,
                'location' => 'HR Office',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Monitor',
                'code' => 'MN-001',
                'name' => 'Dell UltraSharp 27',
                'description' => '27-inch professional monitor',
                'total_stock' => 7,
                'available_stock' => 6,
                'location' => 'IT Room A',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Monitor',
                'code' => 'MN-002',
                'name' => 'LG 24MP60G',
                'description' => '24-inch office monitor',
                'total_stock' => 5,
                'available_stock' => 5,
                'location' => 'Marketing Office',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Networking',
                'code' => 'NW-001',
                'name' => 'Cisco Catalyst 2960',
                'description' => 'Managed network switch',
                'total_stock' => 3,
                'available_stock' => 3,
                'location' => 'Warehouse Rack 1',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Networking',
                'code' => 'NW-002',
                'name' => 'TP-Link Archer AX55',
                'description' => 'Dual-band Wi-Fi router',
                'total_stock' => 6,
                'available_stock' => 6,
                'location' => 'IT Room B',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Networking',
                'code' => 'NW-003',
                'name' => 'Ubiquiti UniFi Lite',
                'description' => 'Access point for wireless coverage',
                'total_stock' => 4,
                'available_stock' => 4,
                'location' => 'IT Room C',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Accessories',
                'code' => 'AC-001',
                'name' => 'Logitech MX Mouse',
                'description' => 'Wireless ergonomic mouse',
                'total_stock' => 12,
                'available_stock' => 12,
                'location' => 'IT Shelf 1',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Accessories',
                'code' => 'AC-002',
                'name' => 'Microsoft Ergonomic Keyboard',
                'description' => 'Comfort keyboard for office staff',
                'total_stock' => 10,
                'available_stock' => 10,
                'location' => 'HR Shelf 2',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Accessories',
                'code' => 'AC-003',
                'name' => 'Anker 65W USB-C Charger',
                'description' => 'Portable laptop charger',
                'total_stock' => 9,
                'available_stock' => 9,
                'location' => 'Marketing Shelf',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Laptop',
                'code' => 'LT-004',
                'name' => 'Acer TravelMate P4',
                'description' => 'Business-class laptop for finance staff',
                'total_stock' => 4,
                'available_stock' => 4,
                'location' => 'Finance Office',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Monitor',
                'code' => 'MN-003',
                'name' => 'Samsung ViewFinity S5',
                'description' => 'High-resolution productivity display',
                'total_stock' => 4,
                'available_stock' => 4,
                'location' => 'IT Room A',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Printer',
                'code' => 'PR-003',
                'name' => 'Brother DCP-L2550D',
                'description' => 'Dual-function laser printer',
                'total_stock' => 3,
                'available_stock' => 3,
                'location' => 'Marketing Office',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Accessories',
                'code' => 'AC-004',
                'name' => 'Zebra Label Printer',
                'description' => 'Barcode and label printing device',
                'total_stock' => 2,
                'available_stock' => 2,
                'location' => 'Warehouse Rack 2',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Networking',
                'code' => 'NW-004',
                'name' => 'Juniper EX2300',
                'description' => 'Entry-level network switch',
                'total_stock' => 2,
                'available_stock' => 2,
                'location' => 'Warehouse Rack 3',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Laptop',
                'code' => 'LT-005',
                'name' => 'Microsoft Surface Laptop 5',
                'description' => 'Portable premium laptop for presentations',
                'total_stock' => 3,
                'available_stock' => 3,
                'location' => 'Marketing Office',
                'condition' => 'Good',
                'status' => 'Available',
            ],
            [
                'category' => 'Monitor',
                'code' => 'MN-004',
                'name' => 'AOC 24B2XH',
                'description' => 'Cost-effective office monitor',
                'total_stock' => 6,
                'available_stock' => 6,
                'location' => 'Finance Office',
                'condition' => 'Good',
                'status' => 'Available',
            ],
        ];

        foreach ($products as $product) {
            if (! isset($categories[$product['category']])) {
                continue;
            }

            Product::firstOrCreate(
                ['code' => $product['code']],
                [
                    'category_id' => $categories[$product['category']],
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'total_stock' => $product['total_stock'],
                    'available_stock' => $product['available_stock'],
                    'location' => $product['location'],
                    'condition' => $product['condition'],
                    'status' => $product['status'],
                ],
            );
        }
    }
}
