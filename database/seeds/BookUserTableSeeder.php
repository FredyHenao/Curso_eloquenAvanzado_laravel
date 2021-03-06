<?php

use Illuminate\Database\Seeder;
use eloquenAvance\User;

class BookUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10 ; $i++){
            $user = User::find($i);
            for ($j = 1 ; $j <= 3 ; $j++){
                $user->manyBooks()->attach(mt_rand(1,20));
            }

        }
    }
}
