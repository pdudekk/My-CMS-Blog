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
         'name' => 'admin1',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('secret'),
     ]);

    }
}
