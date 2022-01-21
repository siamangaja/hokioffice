<?php

namespace Database\Seeders;

use App\Models\Features;
use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('features')->delete();
        \DB::table('features')->insert(array (
            0 =>
            array (
                 'id'       => 1,
                 'icon'     => '<i class="flaticon-sketch"></i>',
                 'title'    => 'Features 1',
                 'content'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.'
            ),
            1 =>
            array (
                 'id'       => 2,
                 'icon'     => '<i class="flaticon-hotel"></i>',
                 'title'    => 'Features 2',
                 'content'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.'
            ),
            2 =>
            array (
                 'id'       => 3,
                 'icon'     => '<i class="flaticon-headset"></i>',
                 'title'    => 'Features 3',
                 'content'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.'
            ),
        ));
    }
}