<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','ahmed-habeeb@outlook.com')->first();

        if(!$user)
        {
            User::create([
               'name'=>'Ahmed Habeeb',
               'email'=>'ahmed-habeeb@outlook.com',
                'role'=>'admin',
                'password'=>Hash::make('30.12.1988Ahmed')
            ]);
        }
    }
}
