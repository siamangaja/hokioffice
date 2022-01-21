<?php

namespace Database\Seeders;

use App\Models\Features;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('services')->delete();
        \DB::table('services')->insert(array (
            0 =>
            array (
                 'id'       => 1,
                 'title'    => 'Lorem ipsum',
                 'slug'     => 'lorem-ipsum',
                 'intro'    => 'lorem ipsum',
                 'content'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>',
                 'thumbnail'=> 'logo.png',
            ),
            1 =>
            array (
                 'id'       => 2,
                 'title'    => 'Sectetur veniam',
                 'slug'     => 'sectetur-veniam',
                 'intro'    => 'sectetur veniam',
                 'content'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>',
                 'thumbnail'=> 'logo.png',
            ),
            2 =>
            array (
                 'id'       => 3,
                 'title'    => 'Magna aliqua',
                 'slug'     => 'magna-aliqua',
                 'intro'    => 'Magna aliqua',
                 'content'  => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>',
                 'thumbnail'=> 'logo.png',
            ),
        ));
    }
}