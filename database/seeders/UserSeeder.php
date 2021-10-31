<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 10; $i++) {
            $userData[] = [
                'name' => \Str::random(10),
                'surname' => \Str::random(10),
                'email' => \Str::random(10).'@gmail.com',
                'password' => \Hash::make('password')
            ];
        }

        foreach ($userData as $user) {
            User::create($user);
        }
    }



}
