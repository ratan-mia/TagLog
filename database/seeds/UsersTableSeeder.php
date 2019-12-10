<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$BoGu0ehFowcvPiT0PWqkSeW0v9R8DLyXjImYjElKG0Q0d0uHRSWVW',
                'remember_token' => null,
                'city'           => '',
                'phone'          => '',
                'facebook'       => '',
                'skype'          => '',
            ],
        ];

        User::insert($users);
    }
}
