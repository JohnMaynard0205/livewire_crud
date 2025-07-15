<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'code' => 'LAP001',
                'name' => 'MacBook Pro 13"',
                'quantity' => 15,
                'price' => 1299.99,
                'description' => 'Apple MacBook Pro with M2 chip, 8GB RAM, 256GB SSD',
            ],
            [
                'code' => 'LAP002',
                'name' => 'Dell XPS 13',
                'quantity' => 8,
                'price' => 999.99,
                'description' => 'Dell XPS 13 laptop with Intel i7 processor, 16GB RAM',
            ],
            [
                'code' => 'PHN001',
                'name' => 'iPhone 15 Pro',
                'quantity' => 25,
                'price' => 999.00,
                'description' => 'Apple iPhone 15 Pro with A17 Pro chip, 128GB storage',
            ],
            [
                'code' => 'PHN002',
                'name' => 'Samsung Galaxy S24',
                'quantity' => 12,
                'price' => 799.99,
                'description' => 'Samsung Galaxy S24 with Snapdragon 8 Gen 3, 256GB',
            ],
            [
                'code' => 'TAB001',
                'name' => 'iPad Air',
                'quantity' => 20,
                'price' => 599.00,
                'description' => 'Apple iPad Air with M1 chip, 64GB storage, WiFi',
            ],
            [
                'code' => 'ACC001',
                'name' => 'AirPods Pro',
                'quantity' => 30,
                'price' => 249.00,
                'description' => 'Apple AirPods Pro with Active Noise Cancellation',
            ],
            [
                'code' => 'ACC002',
                'name' => 'Magic Keyboard',
                'quantity' => 5,
                'price' => 99.00,
                'description' => 'Apple Magic Keyboard for Mac and iPad',
            ],
            [
                'code' => 'MON001',
                'name' => 'LG 27" 4K Monitor',
                'quantity' => 10,
                'price' => 399.99,
                'description' => 'LG 27-inch 4K Ultra HD Monitor with HDR',
            ],
            [
                'code' => 'MON002',
                'name' => 'Samsung 32" Curved Monitor',
                'quantity' => 7,
                'price' => 299.99,
                'description' => 'Samsung 32-inch Curved Gaming Monitor, 144Hz',
            ],
            [
                'code' => 'CAM001',
                'name' => 'Canon EOS R6',
                'quantity' => 3,
                'price' => 2499.00,
                'description' => 'Canon EOS R6 Mirrorless Camera with 20.1MP sensor',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 