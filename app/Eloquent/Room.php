<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\RoomRelation;

class Room extends Model
{
	
    protected $fillable = [
    	'id',
    	'name',
    ];
}
