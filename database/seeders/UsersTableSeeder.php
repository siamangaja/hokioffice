<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Demo";
        $user->email = "demo@demo.com";
        $user->address = "Jl. Demo No. 123 Jakarta 12000";
        $user->phone = "081234567890";
        $user->password = bcrypt('12345678');
        $user->status = 1;
        $user->save();
    }
}