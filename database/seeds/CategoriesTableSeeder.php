<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
          ['name' => 'Sportswear', 'slug' => 'sportswear', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Men', 'slug' => 'men', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Women', 'slug' => 'women', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Kids', 'slug' => 'kids', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Fashion', 'slug' => 'fashion', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Households', 'slug' => 'households', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Interiors', 'slug' => 'interiors', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Clothing', 'slug' => 'clothing', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Bags', 'slug' => 'bags', 'created_at' => $now, 'updated_at' => $now],
          ['name' => 'Shoes', 'slug' => 'shoes', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
