<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\UserRelation;
use App\Eloquent\Relations\DoctorCalender;

class DoctorCalender extends Model
{
	use UserRelation; 
	use DoctorCalender; 
	
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
