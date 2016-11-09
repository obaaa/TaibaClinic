<?php

use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.Saturday






     *
     * @return void
     */
    public function run()
    {
      DB::table('days')->insert([
        ['day_name' => 'Saturday'],
        ['day_name' => 'Sunday'],
        ['day_name' => 'Monday'],
        ['day_name' => 'Tuesday'],
        ['day_name' => 'Wednesday'],
        ['day_name' => 'Thursday'],
        ['day_name' => 'Friday']
      ]);
      }
}
