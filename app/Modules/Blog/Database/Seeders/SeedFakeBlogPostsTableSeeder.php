<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Post;

class SeedFakeBlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=> Str::random(10),
            'slug'=> Str::random(10),
            'post'=> Str::random(10),
            'img'=> Str::random(10),
            'user_id'=> Str::random(10),
            'status'=> Str::random(10),
            'view'=> Str::random(10),
            'like'=> Str::random(10),
            ]);
    }
}
