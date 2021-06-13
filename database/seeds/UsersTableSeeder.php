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
                'name'           => 'Usuario',
                'email'          => 'forense@correo.cl',
                'password'       => '$2y$10$E44UqfAOx8epS0SN2Y3ZvuqXUqRih9xW7UzcDiqzfmOJ5djih9Vq2',
                'remember_token' => null,
                'created_at'     => '2021-06-27 07:11:07',
                'updated_at'     => '2021-06-27 07:11:07',
            ],
        ];

        User::insert($users);
    }
}
