<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\CategoryPostRelation;

class CategoryPostRelate extends Model
{
	use CategoryPostRelation;
	
    protected $fillable = [
        'id',
        'category_id',
        'post_id',
        'status'
    ];
}
