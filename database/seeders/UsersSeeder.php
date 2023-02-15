<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'gender_id' => 1,
                'email' => 'john@example.com',
                'phone' => '1234567890',
                'username' => 'johndoe',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'Jane Smith',
                'gender_id' => 2,
                'email' => 'jane@example.com',
                'phone' => '0987654321',
                'username' => 'janesmith',
                'password' => bcrypt('secret'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
