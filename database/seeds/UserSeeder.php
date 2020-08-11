<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ermin Pehadzic',
            'email' => 'ermin@outlook.com',
            'password' => bcrypt('ermin1234'),
            'isAdmin' => 1,
        ]);
    }
}
