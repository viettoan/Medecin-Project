<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
// use App\Eloquent\Relations\CategoryRelation;

class Media extends Model
{
    protected $fillable = [
    	'id',
    	'path',
    	'medical_history_id',
    	'type',
    	'description',
    	'status'
    ];
}
