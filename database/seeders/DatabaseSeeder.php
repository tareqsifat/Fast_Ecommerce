<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\ProductStyle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // create default page 
        $data = ['aboutus', 'tarmsandcondition', 'returnPolicy', 'healps', 'privacy_policy'];
        for ($i = 0; $i < count($data); $i++) {
            foreach ($data as $state) {
                $state = new Page;
                $state->title = $data[$i];
                $state->save();
                $i += 1;
            }
        }
        $this->call([
            UserSeeder::class,
            DefaultSedder::class,
            CategoryAndBrandSeeder::class,
            ProductSeeder::class,
            SliderSeeder::class,
            DistrictSeeder::class,
            DivisionSeeder::class,
            UpazilaSeeder::class,
        ]);
        ProductStyle::create([
            'card_text' => 'Add to Cart',
            'card_button_text_color' => '#000',
            'card_button_background' => '#4ab70a',
            'card_button_border' => '#4ab70a',
            'card_button_transition' => '.3',
            'card_button_font_style' => 'normal',
            'card_button_font_weight' => '',

            'card_button_text_hover_color' => '',
            'card_button_hover_background' => 'rgb(96 210 216)',
            'card_button_hover_border' => 'rgb(96 210 216)',
            'card_button_hover_font_style' => '',
            'card_button_hover_font_weight' => '',

            'wishlist_button_text_color' => '#333333',
            'wishlist_button_background' => '#ffffff',
            'wishlist_button_border' => '#cccccc',
            'wishlist_button_transition' => '.3',

            'wishlist_button_hover_text_color' => '#333333',
            'wishlist_button_hover_background' => '#e6e6e6',
            'wishlist_button_hover_border' => '#adadad',
        ]);
    }
}
