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
    	'category_id',
    	'content',
        'image',
    	'status',
    ];

    /**
     * Pham Viet Toan
     * 09/27/2017
     * 
     * Get image
     */
    public function getImageAttribute($value)
    {
        return asset(config('custom.post.defaultPath') . $value);
    }
}
