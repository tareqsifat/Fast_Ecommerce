<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\Subcategory;
use App\Models\User;
use DateTime;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Products data 
        $category = Category::pluck('id')->take(3)->toArray();
        $subcategory = Subcategory::pluck('id')->take(3)->toArray();
        $merchent_user = Merchant::where('user_as', 'merchent')->pluck('id')->take(3)->toArray();
        $brand = Brand::pluck('id')->take(3)->toArray();
        $faker = Factory::create();

        for ($i = 1; $i < 20; $i++) {
            if ($i > 12) {
                DB::table('products')->insert([
                    'title' => $faker->sentence(5),
                    'slug' => Str::slug($faker->sentence(5)),
                    'category_id' => $category[array_rand($category)],
                    'subcategory_id' => $subcategory[array_rand($subcategory)],
                    'brand_id' => $brand[array_rand($brand)],
                    'user_id' => 1,
                    'thumbnail' => "digital_$i.jpg",
                    'price' => '100' . $i,
                    'product_code' => "FD" . rand(11111, 99999) . $i,
                    'description2' => $faker->text(1000),
                    'description' => "ENGINE
                    Type: Air cooled , 4 - stroke single cylinder OHC <br>
                    Displacement: 124.7 cc <br>
                    Max. Power: 8.3 kW (11.0 bhp) @ 7500 rpm <br>
                    Max. Torque: 11 N-m @ 6500 rpm <br>
                    Bore x Stroke: 52.4 x 57.8 mm <br>
                    Compression Ratio: 10:1 <br>
                    Starting: Self Start <br>
                    Ignition: Digital DC CDI Ignition System - AMI <br>
                    Fuel System: CV Carburetor - Viscous <br>
                   ",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                // seed teble for product images 
                for ($pi = 1; $pi < 4; $pi++) {
                    DB::table('productimages')->insert([
                        'product_id' => $i,
                        'image' => "digital_$pi.jpg",
                    ]);
                }
            } else { //merchent and campaign
                DB::table('products')->insert([
                    'title' => $faker->sentence(5),
                    'slug' => Str::slug($faker->sentence(5)),
                    'category_id' => $category[array_rand($category)],
                    'subcategory_id' => $subcategory[array_rand($subcategory)],
                    'brand_id' => $brand[array_rand($brand)],
                    'user_id' => $merchent_user[array_rand($merchent_user)],
                    'shop_for' => 'Merchant',
                    'product_for' => 'campaign',
                    'sale_price' => '10' . $i,
                    'thumbnail' => "digital_$i.jpg",
                    'price' => '100' . $i,
                    'description2' => $faker->text(1000),
                    'product_code' => "FD" . rand(11111, 99999) . $i,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                // seed teble for product images 
                for ($pi = 1; $pi < 4; $pi++) {
                    DB::table('productimages')->insert([
                        'product_id' => $i,
                        'image' => "digital_$pi.jpg",
                    ]);
                }
            }
        }
        //merchant and fast deasls prduct
        for ($i = 1; $i < 20; $i++) {
            DB::table('products')->insert([
                'title' => $faker->sentence(5),
                'slug' => Str::slug($faker->sentence(5)),
                'category_id' => $category[array_rand($category)],
                'subcategory_id' => $subcategory[array_rand($subcategory)],
                'brand_id' => $brand[array_rand($brand)],
                'user_id' => 1,
                'shop_for' => 'Merchant',
                'thumbnail' => "digital_$i.jpg",
                'price' => '100' . $i,
                'product_code' => "FD" . rand(11111, 99999) . $i,
                'description2' => $faker->text(1000),
                'description' => "ENGINE
                        Type: Air cooled , 4 - stroke single cylinder OHC <br>
                        Displacement: 124.7 cc <br>
                        Max. Power: 8.3 kW (11.0 bhp) @ 7500 rpm <br>
                        Max. Torque: 11 N-m @ 6500 rpm <br>
                        Bore x Stroke: 52.4 x 57.8 mm <br>
                        Compression Ratio: 10:1 <br>
                        Starting: Self Start <br>
                        Ignition: Digital DC CDI Ignition System - AMI <br>
                        Fuel System: CV Carburetor - Viscous <br>
                       ",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
            // seed teble for product images 
            for ($pi = 1; $pi < 4; $pi++) {
                DB::table('productimages')->insert([
                    'product_id' => $i,
                    'image' => "digital_$pi.jpg",
                ]);
            }
        }
        //hot deals
        for ($i = 1; $i < 5; $i++) {
            DB::table('products')->insert([
                'title' => $faker->sentence(5),
                'slug' => Str::slug($faker->sentence(5)),
                'category_id' => $category[array_rand($category)],
                'subcategory_id' => $subcategory[array_rand($subcategory)],
                'brand_id' => $brand[array_rand($brand)],
                'user_id' => 1,
                'offer_time' => '2021/8/15 12:34:56',
                'thumbnail' => "digital_$i.jpg",
                'price' => '100' . $i,
                'sale_price' => '10' . $i,
                'product_code' => "FD" . rand(11111, 99999) . $i,
                'description2' => $faker->text(1000),
                'description' => "ENGINE
                        Type: Air cooled , 4 - stroke single cylinder OHC <br>
                        Displacement: 124.7 cc <br>
                        Max. Power: 8.3 kW (11.0 bhp) @ 7500 rpm <br>
                        Max. Torque: 11 N-m @ 6500 rpm <br>
                        Bore x Stroke: 52.4 x 57.8 mm <br>
                        Compression Ratio: 10:1 <br>
                        Starting: Self Start <br>
                        Ignition: Digital DC CDI Ignition System - AMI <br>
                        Fuel System: CV Carburetor - Viscous <br>
                       ",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            // seed teble for product images 
            for ($pi = 1; $pi < 4; $pi++) {
                DB::table('productimages')->insert([
                    'product_id' => $i,
                    'image' => "digital_$pi.jpg",
                ]);
            }
        }
    }
}
