<?php
namespace App\Eloquent\Relations;

use App\Eloquent\Category;
use App\Eloquent\CategoryPostRelate;
use App\Eloquent\Post;

trait CategoryRelation
{
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parentCategories()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function postRelationCategories()
    {
        return $this->belongstoMany(CategoryPostRelate::class, 'category_id');
    }
}
