<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@obaaa.sd',
            'user_phone' => '0111700011',
            'password' => bcrypt('p@ssword'),
        ]);
    }
}
