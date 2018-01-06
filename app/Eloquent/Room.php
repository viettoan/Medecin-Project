<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\RoomRelation;

class Room extends Model
{
	use RoomRelation;
	
    protected $fillable = [
    	'id',
    	'name',
    ];
}
