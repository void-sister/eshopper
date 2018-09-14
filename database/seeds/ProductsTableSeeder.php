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
      Product::create([
        'name' => 'PU Off The Shoulder Biker Dress',
        'slug' => 'biker-dress',
        'price' => 25,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Crop Trucker Denim Jacket',
        'slug' => 'denim-jacket',
        'price' => 10,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Tonal Flocked Indigo Denim Skirt',
        'slug' => 'denim-skirt',
        'price' => 30,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Snake Print Slinky Cycling Shorts',
        'slug' => 'cycling-shorts',
        'price' => 22,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Oversized Button Wool Look Coat',
        'slug' => 'look-coat',
        'price' => 40,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Slinky Ruffle Sleeve Tie Front Crop',
        'slug' => 'front-crop',
        'price' => 18,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Ribbed Sleeveless Basic Bodysuit',
        'slug' => 'basic-bodysuit',
        'price' => 12,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Chunky Sports Trainers',
        'slug' => 'sports-trainers',
        'price' => 18,
        'is_available' => true,
      ]);

      Product::create([
        'name' => 'Satin Polka Dot Maxi Ruffle Kimono',
        'slug' => 'ruffle-kimono',
        'price' => 20,
        'is_available' => true,
      ]);

        Product::create([
          'name' => 'Cape Lepel Collar Jumpsuit',
          'slug' => 'collar-jumpsuit',
          'price' => 25,
          'is_available' => true,
        ]);

        Product::create([
          'name' => 'Twist Front Tie Polka Dot Playsuit',
          'slug' => 'dot-playsuit',
          'price' => 20,
          'is_available' => true,
        ]);

        Product::create([
          'name' => 'Button Detail Skort',
          'slug' => 'detail-skort',
          'price' => 16,
          'is_available' => true,
        ]);

        Product::create([
          'name' => 'Chunky Zip Rucksack',
          'slug' => 'zip-rucksack',
          'price' => 20,
          'is_available' => true,
        ]);

        Product::create([
          'name' => 'Light Wash Distressed Hem Boyfriend Jeans',
          'slug' => 'boyfriend-jeans',
          'price' => 25,
          'is_available' => true,
        ]);
    }
}
