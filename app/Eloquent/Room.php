<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\RoomRelation;

class Room extends Model
{
	use PostRelation;
	
    protected $fillable = [
    	'id',
    	'name',
    ];
}
