<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cacio Costa',
            'email' => 'c@c.com',
            'password' => Hash::make('123'),
            'saved' => [1,5,7,9]
        ]);
    }
}
