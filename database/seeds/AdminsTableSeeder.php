<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@school3.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
