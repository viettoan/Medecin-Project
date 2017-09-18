<?php
namespace App\Eloquent\Relations;

use App\Eloquent\Post;
use App\Eloquent\CategoryPostRelate;

trait PostRelation
{
      public function categories()
    {
        return $this->belongstoMany(CategoryPostRelate::class, 'post_id');
    }
}
