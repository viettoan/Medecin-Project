<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\DoctorCalenderRelation;

class DoctorCalender extends Model
{
	use DoctorCalenderRelation;
	
    protected $fillable = [
    	'user_id',
    	'room',
    	'mon',
    	'tue',
    	'wed',
    	'thu',
    	'fri',
    	'sat',
    	'sun'
    ];
}
