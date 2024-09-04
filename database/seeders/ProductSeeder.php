<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        
        Product::create([
                'cat_id' => '3',
                'prod_name' => 'Digital Camera',
                'quantity' =>'100',
                'prod_brand' => 'Ramek',
                'description' => 'Digital camera, 21mp HD ',
                'image' => 'http://127.0.0.1:8000/img/product09.png',
                'img1' =>'http://127.0.0.1:8000/img/product09.png',
                'img2' =>'http://127.0.0.1:8000/img/product09.png',
                'img3' =>'http://127.0.0.1:8000/img/product09.png',
                'img4' =>'http://127.0.0.1:8000/img/product09.png',
                'price' => 45000,
                'seller_id' =>13,
                'prod_status' => 'pending'
            ]);

        Product::create([
                'cat_id' => '3',
                'prod_name' => 'Bluethoot EarPhone',
                'quantity' =>'100',
                'prod_brand' => 'Beat',
                'description' => 'Bluethoot earphone, 5.0',
                'image' => 'http://127.0.0.1:8000/img/product05.png',
                'img1' =>'http://127.0.0.1:8000/img/product05.png',
                'img2' =>'http://127.0.0.1:8000/img/product05.png',
                'img3' =>'http://127.0.0.1:8000/img/product05.png',
                'img4' =>'http://127.0.0.1:8000/img/product05.png',
                'price' => 19000,
                'seller_id' =>13,
                'prod_status' => 'pending'
            ]);

         Product::create([
                'cat_id' => '2',
                'prod_name' => 'MacBook Pro 2015 core i5',
                'quantity' =>'100',
                'prod_brand' => 'Mac',
                'description' => 'Macbbok 2015 core i5 8GB Memory, SSD 256',
                'image' => 'http://127.0.0.1:8000/img/product03.png',
                'img1' =>'http://127.0.0.1:8000/img/product03.png',
                'img2' =>'http://127.0.0.1:8000/img/product03.png',
                'price' => 175000,
                'seller_id' =>13,
                'prod_status' => 'pending'
            ]);

          Product::create([
                'cat_id' => '2',
                'prod_name' => 'MacBook Pro 2017 core i7',
                'quantity' =>'100',
                'prod_brand' => 'MacBook',
                'description' => 'Macbbok 2017 core i7 16GB Memory, SSD 256',
                'image' => 'http://127.0.0.1:8000/img/product01.png',
                'price' => 250000,
                'seller_id'=>13,
                'prod_status' => 'pending'
            ]);

           Product::create([
                'cat_id' => '1',
                'prod_name' => 'Iphone 12',
                'quantity' =>'100',
                'prod_brand' => 'Apple',
                'description' => 'Smart phones',
                'image' => 'http://127.0.0.1:8000/img/iphone12.jpg',
                'price' => 410000,
                'seller_id' =>13,
                'prod_status' => 'pending'
            ]);

            Product::create([
                'cat_id' => '1',
                'prod_name' => 'Samsung S20',
                'quantity' =>'100',
                'prod_brand' => 'Samsung',
                'description' => 'Smart phones',
                'image' => 'http://127.0.0.1:8000/img/product07.png',
                'price' => 650000,
                'seller_id' =>13,
                'prod_status' => 'pending'
            ]);
    }

    
}








