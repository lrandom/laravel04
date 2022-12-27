<?php

namespace Database\Seeders;

use App\Models\ExtraInfo;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagPost;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(5)->create();
        //ExtraInfo::factory(1)->create();
        //Post::factory(5)->create();
        /*   $this->call([
               UserSeeder::class
           ]);*/
        Tag::factory(5)->create();
        TagPost::factory(5)->create();
    }
}
