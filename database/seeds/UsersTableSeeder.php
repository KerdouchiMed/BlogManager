<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'name'  => 'MedK',
          'email'   => 'med@k.me',
          'password'  => bcrypt('password'),
          'admin' => 1
        ]);
    }
}
