<?php

namespace Database\Seeders;

use App\Models\ExtraInfo;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Tagable;
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
        //Tag::factory(5)->create();
        //TagPost::factory(5)->create();
        Product::factory(20)->create();
        Post::factory(20)->create();
        //Image::factory(10)->create();
        //Tagable::factory(15)->create();
    }
}
