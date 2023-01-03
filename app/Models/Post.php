<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function tags()
//    {
//        return $this->belongsToMany(Tag::class, 'tag_posts', 'post_id', 'tag_id');
//    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'tagable');
    }

}
