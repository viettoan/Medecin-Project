<?php
namespace App\Eloquent\Relations;

use App\Eloquent\Category;
use App\Eloquent\CategoryPostRelate;
use App\Eloquent\Post;

trait CategoryPostRelation
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
