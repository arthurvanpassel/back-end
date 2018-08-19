<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->delete();

        $users = array(
            array(
                'username' => 'Arthur',
                'password' => Hash::make('arthur')
            ),
            array(
                'username' => 'Sam',
                'password' => Hash::make('sam')
            )
        );

        DB::table('users')->insert($users);
    }
}