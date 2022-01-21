<?php

namespace Database\Seeders;

use App\Models\Options;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('options')->delete();
        \DB::table('options')->insert(array (
        0 =>
          array (
                 'id' => 1,
                 'name' => 'website',
                 'value' => 'Hoki Office',
                 'description' => 'Website Name'
         ),
        1 =>
          array (
                 'id' => 2,
                 'name' => 'slogan',
                 'value' => 'Profit for your business',
                 'description' => 'Website Slogan'
         ),
        2 =>
          array (
                 'id' => 3,
                 'name' => 'phone',
                 'value' => '(021) 2206 3086',
                 'description' => 'Phone Number'
         ),
        3 =>
          array (
                 'id' => 4,
                 'name' => 'mobile',
                 'value' => '0812 9330 8020',
                 'description' => 'Mobile Number'
         ),
        4 =>
          array (
                 'id' => 5,
                 'name' => 'email',
                 'value' => 'info@hokioffice.com',
                 'description' => 'Email Address'
         ),
        5 =>
          array (
                 'id' => 6,
                 'name' => 'address',
                 'value' => 'Jl. Pusat Niaga Roxy Mas Blok D3 No.10, Gambir, Jakarta 10150',
                 'description' => 'Office Address'
         ),
        6 =>
          array (
                 'id' => 7,
                 'name' => 'facebook',
                 'value' => 'https://facebook.com/',
                 'description' => 'Facebook Link'
         ),
        7 =>
          array (
                 'id' => 8,
                 'name' => 'twitter',
                 'value' => 'https://twitter.com/',
                 'description' => 'Twitter Link'
         ),
        8 =>
          array (
                 'id' => 9,
                 'name' => 'instagram',
                 'value' => 'https://instagram.com/',
                 'description' => 'Instagram Link'
         ),
        ));
    }
}