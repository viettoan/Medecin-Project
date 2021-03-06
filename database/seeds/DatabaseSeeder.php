<?php

use Illuminate\Database\Seeder;
use App\Eloquent\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'age' => 22,
            'sex' => 1,
            'phone' => '0123456789',
	        'address' => 'Ha Noi',
	        'permistion' => 1,
        ];

        User::create($user);
    }
}
