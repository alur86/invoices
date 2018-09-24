<?php

use Illuminate\Database\Seeder;

class AddDueEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $data = [
         ['title'=>'Invoice#1', 'start_date'=>'2018-08-01', 'end_date'=>'2018-09-01'],
         ['title'=>'Invoice#1', 'start_date'=>'2018-08-11', 'end_date'=>'2018-09-25'],
        ];
        \DB::table('events')->insert($data);
    
    }
}
