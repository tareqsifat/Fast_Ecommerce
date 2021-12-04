<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\Merchant;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'a',
            'email' => 'a@gmail.com',
            'password' => Hash::make('12356789'),
            'user_role' => '1',
            'user_as' => 'admin',
            'phone' => '01744331991',
        ]);
        Customers::create([
            'name' => 'user',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('12356789'),
            'user_role' => '1',
            'user_as' => 'user',
            'verify_status' => 1,
            'phone' => '01518488865',
        ]);
        Merchant::create([
            'name' => 'merchent',
            'email' => 'merchant@gmail.com',
            'password' => Hash::make('12356789'),
            'user_role' => '1',
            'user_as' => 'merchent',
            'phone' => '01705936855',
            'verify_status' => 1,
        ]);

        $faker = Factory::create();
        for ($i = 1; $i < 22; $i++) {
            DB::table('merchants')->insert([
                'name' => $faker->name(),
                'email' => "$faker->name@gmail.com",
                'password' => Hash::make('12356789'),
                'user_role' => '1',
                'profile_photo_path' =>  "digital_$i.jpg",
                'user_as' => 'merchent',
                'delevery_system' => 'cash_on',
                'phone' => "0170593685$i",
                'verify_status' => 1,
            ]);
        }
    }
}
