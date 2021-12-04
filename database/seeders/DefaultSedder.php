<?php

namespace Database\Seeders;

use App\Models\Pmethod;
use App\Models\Service;
use App\Models\Social;
use App\Models\Topbar;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sitedefaults')->insert([
            'logo'     => 'logo.png',
            'favicon'  => NULL,
            'copyright'  => 'Copyright © 2020. All rights reserved',
            'sitedescription'  => "Online Shopping BD has never been easier. fastdeals.me.bd is best online shopping store in Bangladesh that features 10+ million products at affordable prices. As Bangladesh's online shopping landscape is expanding every year, online shopping in dhaka, chittagong, khulna, sylhet and other big cities are also gaining momentum.",
            'address'  => 'Dhaka, Bangladesh',
            'onsellTime'     => '2021/8/15 12:34:56',
            'phone'  => '01779387447',
            'email'  => 'fastdealsinfo21@gmail.com',
        ]);
        // topbar 
        Topbar::create([
            'phone' => '01779387447',
            'email' => 'fastdealsinfo21@gmail.com',
            'button' => '',
        ]);
        // social 
        $faker = Factory::create();
        Social::insert(array([
            'name' => 'facebook',
            'icon' => 'fab fa-facebook',
            'url' => 'www.facebook.com',
        ], [
            'name' => 'twwiter',
            'icon' => 'fab fa-twitter',
            'url' => 'www.twitter.com',
        ], [
            'name' => 'linkedin',
            'icon' => 'fab fa-linkedin',
            'url' => 'www.linkedin.com',
        ], [
            'name' => 'google-plus-g',
            'icon' => 'fab fa-google-plus-g',
            'url' => 'www.google-plus-g.com',
        ]));

        // social 
        Service::insert(array([
            'title' => 'FREE SHIPPING',
            'icon' => 'fa fa-truck',
            'subtitle' => $faker->sentence(5),
            'description' => $faker->sentence(5),
        ], [
            'title' => 'SPECIAL OFFER',
            'icon' => 'fa fa-gift',
            'subtitle' => $faker->sentence(5),
            'description' => $faker->sentence(5),
        ], [
            'title' => 'OUR POLICY',
            'icon' => 'fa fa-recycle',
            'subtitle' => $faker->sentence(5),
            'description' => $faker->sentence(5),
        ], [
            'title' => 'ORDER RETURN',
            'icon' => 'fa fa-reply',
            'subtitle' => $faker->sentence(5),
            'description' => $faker->sentence(5),
        ]));
        // social 
        Pmethod::insert(array([
            'name' => 'vista',
            'image' => 'vista.png',
        ], [
            'name' => 'mastercard',
            'image' => 'mastercard.png',
        ], [
            'name' => 'paypal',
            'image' => 'paypal.png',
        ], [
            'name' => 'circus',
            'image' => 'circus.png',
        ]));
    }
}
