<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\PostRelation;

class Post extends Model
{
	use PostRelation;
	
    protected $fillable = [
    	'id',
    	'title',
    	'description',
    	'content',
    	'status',
    ];
}
