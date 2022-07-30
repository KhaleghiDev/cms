<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;
use Modules\User\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Category::factory(10)->create();
        Tag::factory(10)->create();
        Post::factory(10)->create();
   }
}

