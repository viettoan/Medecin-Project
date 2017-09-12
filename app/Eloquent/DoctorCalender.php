<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
// use App\Eloquent\Relations\CategoryRelation;

class DoctorCalender extends Model
{
    protected $fillable = [
    	'id',
    	'user_id',
    	'room',
    	'morning',
    	'afternoon',
    	'night',
    	'status'
    ];
}
