<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->truncate();

        $shops = [
            ['store_name' => 'MPINGI SHOP', 'product_id' => '1'],
            ['store_name' => 'JULIANNA FASHION', 'product_id' => '2'],
            ['store_name' => 'MPINGI', 'product_id' => '3'],
            ['store_name' => 'TWINZ INTERNAT CAFE', 'product_id' => '3'],
            ['store_name' => 'RACHEL STORE', 'product_id' => '2'],
            ['store_name' => 'MEDICAL LINK SERVICES', 'product_id' => '3'],
            ['store_name' => 'TREZ', 'product_id' => '1'],
            ['store_name' => 'BELLE CLARA SHOP', 'product_id' => '3'],
            ['store_name' => 'LAUREN RITZ (U) LTD', 'product_id' => '1'],
            ['store_name' => 'LAZINA NIPATE', 'product_id' => '2'],
            ['store_name' => 'EVENTS DRC', 'product_id' => '1'],
            ['store_name' => 'HELLOZY PROPERTY...', 'product_id' => '2'],
            ['store_name' => 'SERDINGA STORE', 'product_id' => '3'],
            ['store_name' => 'ACCESS YOUTH...', 'product_id' => '2'],
            ['store_name' => 'DONYUSTO', 'product_id' => '3'],
            ['store_name' => 'NATALIE COLLECTION', 'product_id' => '2'],
            ['store_name' => 'JUMBO PAINTS', 'product_id' => '2'],
            ['store_name' => 'JEROME BAY', 'product_id' => '1'],
            ['store_name' => 'EMMA NGUNGU STORE', 'product_id' => '3'],
            ['store_name' => 'TAULAS SHOP', 'product_id' => '3'],
            ['store_name' => 'CHEZ YOUYOU', 'product_id' => '3'],
            ['store_name' => 'RYNAJ', 'product_id' => '3'],
            ['store_name' => 'BONDEKO REFUGEE...', 'product_id' => '2'],
            ['store_name' => 'QUEEN FASHION SHOP', 'product_id' => '3'],
            ['store_name' => 'HAM', 'product_id' => '3'],
            ['store_name' => 'MATAM YOUTH...', 'product_id' => '3'],
            ['store_name' => 'SABRI DE LUX BUSINESS', 'product_id' => '2'],
            ['store_name' => 'HASSAN MINING COMPANY', 'product_id' => '3'],
            ['store_name' => 'SARA &amp; EZRA SHOP CENTER...', 'product_id' => '3'],
            ['store_name' => 'HELLOZY PROPERTY...', 'product_id' => '3'],
            ['store_name' => 'BLICSHOP', 'product_id' => '3'],
            ['store_name' => 'HAM SHOP', 'product_id' => '3'],
            ['store_name' => 'DANIEL NASASIRA', 'product_id' => '3'],
            ['store_name' => 'MPINGI ONLINE MARKET...', 'product_id' => '3'],
            ['store_name' => 'EPCOM-UGANDA', 'product_id' => '3'],
            ['store_name' => 'MPINGI SHOP', 'product_id' => '2'],
            ['store_name' => 'MOUHAMADOU MOCTAR FALL...', 'product_id' => '3'],
            ['store_name' => 'NZUZI MPINGI', 'product_id' => '1'],
            ['store_name' => 'OAF FASHION', 'product_id' => '2'],
            ['store_name' => 'MPINGIPRO SHOP', 'product_id' => '1'],
            ['store_name' => 'DESANGE QUEEN FASHION', 'product_id' => '1'],
            ['store_name' => 'GEDEON SHOP', 'product_id' => '3'],
            ['store_name' => 'JOJO SHOP', 'product_id' => '1'],
            ['store_name' => 'SARYO COLLECTION', 'product_id' => '2'],
            ['store_name' => 'DOUDOU', 'product_id' => '2'],




        ];

        DB::table('shops')->insert($shops);
    }
}
