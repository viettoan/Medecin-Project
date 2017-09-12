<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
// use App\Eloquent\Relations\CategoryRelation

class Post extends Model
{
    protected $fillable = [
    	'id',
    	'title',
    	'Description',
    	'content',
    	'status',
    ];
}
