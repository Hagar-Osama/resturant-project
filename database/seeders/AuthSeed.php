<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'hagar osama',
            'email'=> 'hagarosama142@gmail.com',
            'password'=>Hash::make('12345678')
        ]);
    }
}
