<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Sportswear
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Sportswear' . $i,
          'slug' => 'sportswear-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(1);
      }

      $product = Product::find(1);
      $product->categories()->attach(2);

      //Men
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Men' . $i,
          'slug' => 'men-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(2);
      }

      //Women
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Women' . $i,
          'slug' => 'women-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(3);
      }

      //Kids
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Kids' . $i,
          'slug' => 'kids-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(4);
      }

      //Fashion
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Fashion' . $i,
          'slug' => 'fashion-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(5);
      }

      //Households
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Households' . $i,
          'slug' => 'households-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(6);
      }

      //Interiors
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Interiors' . $i,
          'slug' => 'interiors-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(7);
      }

      //Clothing
      for($i = 1; $i < 30; $i++)
      {
        Product::create([
          'name' => 'Clothing' . $i,
          'slug' => 'clothing-' . $i,
          'price' => rand(18, 45),
          'is_available' => true,
        ])->categories()->attach(8);
      }
    }
}
