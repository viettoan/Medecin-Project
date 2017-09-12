<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\CategoryRelation;

class Category extends Model
{
	use CategoryRelation;

    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'created_at',
        'updated_at',
        'status'
    ];

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
