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
    	 factory(App\Eloquent\Post::class, 50)->create();
    }
}
