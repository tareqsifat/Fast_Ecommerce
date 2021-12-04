<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryAndBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $catData =  array(
            array('id' => '1', 'user_id' => '1', 'name' => 'Electronic Devices', 'slug' => 'Electronic-Devices', 'index_no' => 1, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '2', 'user_id' => '1', 'name' => 'Electronics Accessories', 'slug' => 'Electronics-Accessories',  'index_no' => 2, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '3', 'user_id' => '1', 'name' => 'TV & Home Appliances', 'slug' => 'TV-&-Home-Appliances',  'index_no' => 3, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '4', 'user_id' => '1', 'name' => 'Health & Beauty', 'slug' => 'Health-&-Beauty',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '5', 'user_id' => '1', 'name' => 'Babies & Toys', 'slug' => 'Babies-&-Toys',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '6', 'user_id' => '1', 'name' => 'Groceries & Pets', 'slug' => 'Groceries-&-Pets',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '7', 'user_id' => '1', 'name' => 'Home & Lifestyle', 'slug' => 'Home-&-Lifestyle',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '8', 'user_id' => '1', 'name' => "Women's Fashion", 'slug' => 'Women-s-Fashion',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '9', 'user_id' => '1', 'name' => "men's Fashion", 'slug' => 'men-s-Fashion',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '10', 'user_id' => '1', 'name' => "Watches & Accesories", 'slug' => 'Watches-&-Accesories',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '11', 'user_id' => '1', 'name' => "Sports & Outdoor", 'slug' => 'Sports-&-Outdoor',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),
            array('id' => '12', 'user_id' => '1', 'name' => "Automotive & Motorbike", 'slug' => 'Automotive-&-Motorbike',  'index_no' => null, 'created_at' => date('Y-m-d H:i:s')),

        );
        DB::table('categories')->insert($catData);

        // Subcategory one
        $subOne = [
            "Smartphones",
            "Feature Phone",
            "Tablets",
            "Laptops",
            "Desktops",
            "Gaming Console",
            "Camera",
            "Security Camera",
        ];

        for ($i = 0; $i < count($subOne); $i++) {
            foreach ($subOne as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $subOne[$i];
                $dbsubcat->category_id = 1;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $subOne[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // Subcategory two Electronics Accessories
        $subTwo = [
            'Mobile Accessories',
            'Audio',
            'Wearale',
            'Console Acessories',
            'Camera Acccesories',
            'Computer Accessories',
            'Storage',
            'Printers',
            'Computer Components',
            'Network Components',
            'Software',
        ];
        for ($i = 0; $i < count($subTwo); $i++) {
            foreach ($subTwo as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $subTwo[$i];
                $dbsubcat->category_id = 2;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $subTwo[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // three TV & Hme Appliances
        $subThree = [
            "Television",
            "Home Audio",
            "TV Accssories & Video Devics",
            "Large Appliacnces",
            "Small Kitchen Appliances",
            "Cooling & Heating",
            "Fan",
            "Vacuums & Floor Car",
            "Irons & Garmens Steamers",
            "Water Puriffier & Filters",
        ];
        for ($i = 0; $i < count($subThree); $i++) {
            foreach ($subThree as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $subThree[$i];
                $dbsubcat->category_id = 3;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $subThree[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // four Health and beauty
        $subFour = [
            'Bath and body',
            'beauty tools',
            'fragrances',
            'hair care',
            'makeup',
            'men care',
            'personal care',
            'skin care',
            'food suppliments',
            'medical supplies',
            'sexual wellness',
        ];
        for ($i = 0; $i < count($subFour); $i++) {
            foreach ($subFour as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $subFour[$i];
                $dbsubcat->category_id = 4;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $subFour[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // Five babies and toys 
        $subFive = [
            'mother and baby',
            'feeding',
            'diaper and potty ',
            'baby gear',
            'baby personal care',
            'clothing and accessories',
            'nursery',
            'toys and games',
            'baby and toddler toys',
            'remote controls and vehicles',
            'sports and outdoor play',
            'traditional games',
        ];
        for ($i = 0; $i < count($subFive); $i++) {
            foreach ($subFive as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $subFive[$i];
                $dbsubcat->category_id = 5;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $subFive[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // Five   groceries and pets 
        $sub6 = [
            'beverages',
            'breakfast,choco and snacks',
            'food staples',
            'cooking ingredients ',
            'laundry amd households',
            'cat',
            'dog ',
            'fish ',
            'bird',
            'small pet',
            'lifestyles accessories ',
        ];
        for ($i = 0; $i < count($sub6); $i++) {
            foreach ($sub6 as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $sub6[$i];
                $dbsubcat->category_id = 6;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $sub6[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // Five    home and lifestyle 
        $sub7 = [
            'bath',
            'bedding',
            'decor',
            'furnisher',
            'kitchen and dining',
            'lighting',
            'laundry and cleaning ',
            'toools ,diy and outdoor',
            'stationery amd crafts',
            'media,music and books',
        ];
        for ($i = 0; $i < count($sub7); $i++) {
            foreach ($sub7 as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $sub7[$i];
                $dbsubcat->category_id = 7;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $sub7[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // sub8  women fashion
        $sub8 = [
            'saree',
            'salwar kameez',
            'women dresses ',
            'kurti',
            'lingerie,sleep and lounge ',
            'western and winter clothing ',
            'girls fashion',
            'womens bag',
            'shoes',
            'accesories ',
            'travel',
        ];
        for ($i = 0; $i < count($sub8); $i++) {
            foreach ($sub8 as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $sub8[$i];
                $dbsubcat->category_id = 8;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $sub8[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // sub9  men fashion
        $sub9 = [
            'tshirt',
            'kurtas',
            'shirts',
            'polo shirts',
            'jeans',
            'chinos',
            'pants',
            'shoes',
            'bags and travels',
            'accesories ',
            'clothing ',
        ];
        for ($i = 0; $i < count($sub9); $i++) {
            foreach ($sub9 as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $sub9[$i];
                $dbsubcat->category_id = 9;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $sub9[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // sub10 watches and accessories 	
        $sub10 = [
            'mens watch',
            'womens watch',
            'men jewellery',
            'women jewellery',
            'fashion mask ',
            'mens belt',
            'men wallet',
            'sunglass',
            'eyeglass',
            'kid watch',
        ];
        for ($i = 0; $i < count($sub10); $i++) {
            foreach ($sub10 as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $sub10[$i];
                $dbsubcat->category_id = 10;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $sub10[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // sub11 sports and outdoor		
        $sub11 = [
            'treadmills',
            'fitness accessories ',
            'dumbbells ',
            'cyclings',
            'boxing,martial arts and MMA',
            'men shoes and clothing ',
            'outdoor recreation ',
            'exercise and fitness ',
            'racket sports ',
            'team sports',
            'camping and hiking',
            'fanshops',
        ];
        for ($i = 0; $i < count($sub11); $i++) {
            foreach ($sub11 as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $sub11[$i];
                $dbsubcat->category_id = 11;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $sub11[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        // sub12 automotive amd motorbikes	
        $sub12 = [
            'automobile',
            'auto oil and fluids',
            'interior accessories ',
            'exterior accessories ',
            'interior vehicle care',
            'exterior vehicle care',
            'car electronic accessories ',
            'car audio',
            'motorcycle',
            'moto parts and accessories ',
            'motocycle riding gear ',
        ];
        for ($i = 0; $i < count($sub12); $i++) {
            foreach ($sub12 as $subitem) {
                $dbsubcat = new Subcategory;
                $dbsubcat->name = $sub12[$i];
                $dbsubcat->category_id = 12;
                $dbsubcat->user_id = 1;
                $dbsubcat->slug = str_replace(' ', '-', $sub12[$i]);
                $dbsubcat->created_at = date('Y-m-d H:i:s');
                $dbsubcat->updated_at = date('Y-m-d H:i:s');
                $dbsubcat->save();
                $i += 1;
            }
        }
        $faker = Factory::create();
        // create brands data 
        for ($i = 1; $i < 10; $i++) {
            DB::table('brands')->insert([
                'name' => $faker->sentence(2),
                'slug' => Str::slug($faker->sentence(2)),
                'user_id' => 1,
                'brand_logo' => "digital_$i.jpg",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
