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

            // Laptop
            [
                'category' => 'Laptop',
                'code' => 'LP001',
                'name' => 'Lenovo ThinkPad E14',
                'description' => 'Business laptop',
                'total_stock' => 20,
                'available_stock' => 18,
            ],
            [
                'category' => 'Laptop',
                'code' => 'LP002',
                'name' => 'HP EliteBook 840 G9',
                'description' => 'Office laptop',
                'total_stock' => 15,
                'available_stock' => 15,
            ],
            [
                'category' => 'Laptop',
                'code' => 'LP003',
                'name' => 'Dell Latitude 7440',
                'description' => 'Enterprise laptop',
                'total_stock' => 10,
                'available_stock' => 9,
            ],

            // Projector
            [
                'category' => 'Projector',
                'code' => 'PJ001',
                'name' => 'Epson EB-E01',
                'description' => 'LCD Projector',
                'total_stock' => 5,
                'available_stock' => 4,
            ],
            [
                'category' => 'Projector',
                'code' => 'PJ002',
                'name' => 'BenQ MX560',
                'description' => 'Meeting projector',
                'total_stock' => 3,
                'available_stock' => 3,
            ],

            // Printer
            [
                'category' => 'Printer',
                'code' => 'PR001',
                'name' => 'HP LaserJet Pro',
                'description' => 'Laser printer',
                'total_stock' => 6,
                'available_stock' => 6,
            ],
            [
                'category' => 'Printer',
                'code' => 'PR002',
                'name' => 'Canon PIXMA G3020',
                'description' => 'Ink tank printer',
                'total_stock' => 4,
                'available_stock' => 3,
            ],

            // Monitor
            [
                'category' => 'Monitor',
                'code' => 'MN001',
                'name' => 'Dell 24" Monitor',
                'description' => 'Full HD Monitor',
                'total_stock' => 12,
                'available_stock' => 10,
            ],
            [
                'category' => 'Monitor',
                'code' => 'MN002',
                'name' => 'LG 27" IPS Monitor',
                'description' => 'IPS Display',
                'total_stock' => 8,
                'available_stock' => 8,
            ],

            // Networking
            [
                'category' => 'Networking',
                'code' => 'NW001',
                'name' => 'Cisco Catalyst Switch',
                'description' => 'Managed switch',
                'total_stock' => 4,
                'available_stock' => 4,
            ],
            [
                'category' => 'Networking',
                'code' => 'NW002',
                'name' => 'TP-Link Archer AX55',
                'description' => 'Wireless router',
                'total_stock' => 5,
                'available_stock' => 5,
            ],

            // Peripheral
            [
                'category' => 'Peripheral',
                'code' => 'PF001',
                'name' => 'Logitech Wireless Mouse',
                'description' => 'Wireless mouse',
                'total_stock' => 30,
                'available_stock' => 28,
            ],
            [
                'category' => 'Peripheral',
                'code' => 'PF002',
                'name' => 'Logitech Keyboard',
                'description' => 'USB Keyboard',
                'total_stock' => 25,
                'available_stock' => 25,
            ],
            [
                'category' => 'Peripheral',
                'code' => 'PF003',
                'name' => 'Logitech Webcam C920',
                'description' => 'HD Webcam',
                'total_stock' => 8,
                'available_stock' => 7,
            ],
            [
                'category' => 'Peripheral',
                'code' => 'PF004',
                'name' => 'HDMI Cable 3 Meter',
                'description' => 'HDMI cable',
                'total_stock' => 40,
                'available_stock' => 38,
            ],
            [
                'category' => 'Peripheral',
                'code' => 'PF005',
                'name' => 'Extension Cable',
                'description' => 'Power extension cable',
                'total_stock' => 20,
                'available_stock' => 19,
            ],

            // Office Equipment
            [
                'category' => 'Office Equipment',
                'code' => 'OE001',
                'name' => 'Canon Document Scanner',
                'description' => 'Document scanner',
                'total_stock' => 4,
                'available_stock' => 4,
            ],
            [
                'category' => 'Office Equipment',
                'code' => 'OE002',
                'name' => 'APC UPS 1200VA',
                'description' => 'UPS backup power',
                'total_stock' => 6,
                'available_stock' => 5,
            ],
            [
                'category' => 'Office Equipment',
                'code' => 'OE003',
                'name' => 'Portable Speaker',
                'description' => 'Meeting speaker',
                'total_stock' => 5,
                'available_stock' => 4,
            ],
            [
                'category' => 'Office Equipment',
                'code' => 'OE004',
                'name' => 'Wireless Microphone',
                'description' => 'Wireless microphone',
                'total_stock' => 6,
                'available_stock' => 6,
            ],

            // Furniture
            [
                'category' => 'Furniture',
                'code' => 'FR001',
                'name' => 'Whiteboard 120 x 90 cm',
                'description' => 'Magnetic whiteboard',
                'total_stock' => 8,
                'available_stock' => 7,
            ],
            [
                'category' => 'Furniture',
                'code' => 'FR002',
                'name' => 'Folding Chair',
                'description' => 'Portable meeting chair',
                'total_stock' => 50,
                'available_stock' => 46,
            ],
            [
                'category' => 'Furniture',
                'code' => 'FR003',
                'name' => 'Folding Table',
                'description' => 'Portable meeting table',
                'total_stock' => 15,
                'available_stock' => 14,
            ],

        ];

        foreach ($products as $product) {

            if (! isset($categories[$product['category']])) {
                continue;
            }

            Product::firstOrCreate(
                [
                    'code' => $product['code'],
                ],
                [
                    'category_id' => $categories[$product['category']],
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'total_stock' => $product['total_stock'],
                    'available_stock' => $product['available_stock'],
                ]
            );
        }
    }
}