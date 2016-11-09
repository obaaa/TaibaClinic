<?php

use Illuminate\Database\Seeder;

class ShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
          ['shift_name' => 'Morning Shift'],
          ['shift_name' => 'Evening Shift']
        ]);
    }
}
