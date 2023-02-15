<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hobby;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hobbies = ['ngoding', 'games', 'basket'];

        foreach ($hobbies as $Hobby) {
            Hobby::create([
                'name' => $Hobby,
            ]);
        }
    }
}
