<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // [
            //     'name' => 'Apple I Pad',
            //     'description' => '500GB Storage, 8GB RAM',
            //     'price' => '10000',
            //     'category' => 'Electronics',
            //     'gallery' => 'https://vsprod.vijaysales.com/media/catalog/product/i/p/ipad_11_wifi_blue_1_.jpg?optimize=medium&fit=bounds&height=500&width=500',
            // ],
            // Add more products as needed
            [
                'name' => 'Apple Macbook',
                'description' => '500GB Storage, 8GB RAM',
                'price' => '100000',
                'category' => 'Electronics',
                'gallery' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/mba13-skyblue-select-202503?wid=904&hei=840&fmt=jpeg&qlt=90&.v=M2RyY09CWXlTQUp1KzEveHR6VXNxcTQ1bzN1SitYTU83Mm9wbk1xa1lWNC9UNzNvY2N5NXJTTDQ2YkVYYmVXakJkRlpCNVhYU3AwTldRQldlSnpRa0lIV0Fmdk9rUlVsZ3hnNXZ3K3lEVlk',
            ],
            [
                'name' => 'Apple I Phone',
                'description' => '500GB Storage, 8GB RAM',
                'price' => '100000',
                'category' => 'Electronics',
                'gallery' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/iphone16-digitalmat-gallery-1-202409?wid=728&hei=666&fmt=p-jpg&qlt=95&.v=Y2tBd1RqSzMrd3hScm1lN290ZENDS041dXh2MUpWOGFNK2V6eVg1VGV3OHlLZ0xXbFByV2Vvak9rWndaamlPU3cvMldkdDlIc0lud2tjcDJ3djFCUkV2dGpWUjV5VzZtaGp2QjBiUXR3RUFOM1EvNmN2VndPa21RenM3N2pucTg',
            ],
        ]);
    }
}
