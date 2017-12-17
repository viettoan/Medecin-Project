<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\CategoryRelation;
use App\Eloquent\Relations\PostRelation;

class Category extends Model
{
	use CategoryRelation;
    use PostRelation;

    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'status',
        'link',
    ];

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
