<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\CategoryRelation;

class CategoryPostRelate extends Model
{
	use CategoryRelation;
	
    protected $fillable = [
        'id',
        'category_id',
        'post_id',
        'status'
    ];
}
