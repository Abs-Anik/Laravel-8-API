<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Anik', 'email' => 'anik@gmail.com', 'password' => bcrypt('123456')],
            ['name' => 'Siddik', 'email' => 'siddik@gmail.com', 'password' => bcrypt('123456')],
            ['name' => 'Abu', 'email' => 'abu@gmail.com', 'password' => bcrypt('123456')],
        ];

        User::insert($users);
    }
}
