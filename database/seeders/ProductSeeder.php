<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();

        $products = [
            ['product_image' => '126471149.jpg', 'product_name' => 'MITSUBISHI' , 'product_price' => '2,300'],
            ['product_image' => '280980403.jpg', 'product_name' => 'NIKE AIR MAX SC', 'product_price' => '$ 140'],
            ['product_image' => '366120162.jpg', 'product_name' => 'HYUNDAI SANTA', 'product_price' => '$ 13,500'],
            ['product_image' => '370226165.jpg', 'product_name' => 'ENSEMBLE', 'product_price' => '$ 50'],
            ['product_image' => '561232202.jpg', 'product_name' => 'NISSAN ALTIMA', 'product_price' => '2,500'],
            ['product_image' => '1175975764.jpg', 'product_name' => 'TABLE', 'product_price' => '150'],
            ['product_image' => '1207242557.jpg', 'product_name' => 'BAZIN RICHE', 'product_price' => 'CDF 200'],
            ['product_image' => '1290671866.jpg', 'product_name' => 'BAZIN RICHE', 'product_price' => 'CDF 200'],
            ['product_image' => '1655411362.jpg', 'product_name' => 'POLO', 'product_price' => '$ 50'],
            ['product_image' => '1679199828.jpg', 'product_name' => 'KIA FORTE 2011', 'product_price' => '3,900'],
            ['product_image' => '1697868153.jpg', 'product_name' => 'BAZIN RICHE', 'product_price' => 'CDF 200'],
            ['product_image' => '1702691256.jpg', 'product_name' => '2013-2016', 'product_price' => '350'],
            ['product_image' => '2077565091.jpg', 'product_name' => 'HYUNDAI SANTA', 'product_price' => '$ 13,500'],

        ];

        DB::table('products')->insert($products);
    }
}
