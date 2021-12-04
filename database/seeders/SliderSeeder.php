<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed teble for home mail slider images 
        for ($i = 1; $i < 3; $i++) {
            DB::table('sliders')->insert([
                'name' => 'lorem ipsum brand' . $i,
                'url' => "https//:www.google.com",
                'slider_for' => "home_main_slider",
                'image' => "main-slider-1-$i.jpg",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        // seed teble for home mail slider images 
        for ($i = 1; $i < 3; $i++) {
            DB::table('sliders')->insert([
                'name' => 'lorem ipsum brand' . $i,
                'url' => "https//:www.google.com",
                'slider_for' => "banner_slider",
                'image' => "2-carpenter-tools-banner-$i.jpg",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
