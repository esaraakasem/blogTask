<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'admin',
            'email' => 'admin@mail.com',
            'role'=>'admin',
            'password' => bcrypt('123456')

        ]);
    }
}
