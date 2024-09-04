<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          Categories::create([
                'cat_id' => '1',
                'cat_name' => 'Phones & Tablets',
                'cat_description' => 'Mobile Phones'
            
            ]);
            
             Categories::create([
                'cat_id' => '2',
                'cat_name' => 'Computing',
                'cat_description' => 'Computers'
            
            ]);
             Categories::create([
                'cat_id' => '3',
                'cat_name' => 'Electronics',
                'cat_description' => 'Elect Appliances'
            
            ]);
             Categories::create([
                'cat_id' => '4',
                'cat_name' => 'Fashion',
                'cat_description' => 'Clothing, Shoes, Wtaches'
            
            ]);
             Categories::create([
                'cat_id' => '5',
                'cat_name' => 'Kids & Baby',
                'cat_description' => 'Children products'
            
            ]);
             Categories::create([
                'cat_id' => '6',
                'cat_name' => 'Home & Kitchen Appliances',
                'cat_description' => 'Kitchen appliances'
            ]);
             Categories::create([
                'cat_id' => '7',
                'cat_name' => 'Beauty & Skin Care',
                'cat_description' => 'Costmetics'
            
            ]);
             Categories::create([
                'cat_id' => '8',
                'cat_name' => 'Groceries',
                'cat_description' => 'Food, Brewverages, Drinks, Wine, Water '
            
            ]);
               Categories::create([
                'cat_id' => '9',
                'cat_name' => 'Pet Supplies',
                'cat_description' => 'Animal Feeds, Dog food'
            
            ]);

    }
}
