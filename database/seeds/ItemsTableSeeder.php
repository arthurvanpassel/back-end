<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder {
    public function run() {
        DB::table('items')->delete();

        $items = array(
            array(
                'owner_id' => 1,
                'name' => 'Pick up milk',
                'done' => false,
                'deleted' => false,
                'due_date' => '18-08-22',
                'comments' => 'Make it whole milk'
            ),
            
            array(
                'owner_id' => 1,
                'name' => 'Ace this exam',
                'done' => false,
                'deleted' => false,
                'due_date' => '18-08-21',
                'comments' => 'Maybe showing these awesome comments will help...'
            ),

            array(
                'owner_id' => 1,
                'name' => 'Walk the dog',
                'done' => true,
                'deleted' => false,
                'due_date' => '18-08-18',
                'comments' => ''
            ),

            array(
                'owner_id' => 2,
                'name' => 'Cook lunch',
                'done' => false,
                'deleted' => false,
                'due_date' => '18-08-22',
                'comments' => "Don't forget dessert!"
            )
        );

        DB::table('items')->insert($items);
    }
}