<?php

use Illuminate\Database\Seeder;

class CheckedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checkeds')->insert([
            'checked_name' => 'not_delete',
            'checked_price' => '0',
        ]);
    }
}
