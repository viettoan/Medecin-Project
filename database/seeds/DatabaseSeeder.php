<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Post;
use App\Eloquent\CategoryPostRelate;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoryPostRelate::class, 50)->create();
    }
}
