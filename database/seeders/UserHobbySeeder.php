<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserHobby;

class UserHobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userHobbies = [

            [
                'hobby_id' => 2,
                'user_id' => 1,
            ],
            [
                'hobby_id' => 1,
                'user_id' => 1,
            ],
            [
                'hobby_id' => 2,
                'user_id' => 2,
            ],
            [
                'hobby_id' => 1,
                'user_id' => 2,
            ],
        ];

        foreach ($userHobbies as $userHobby) {
            UserHobby::create($userHobby);
        }

    }
}
