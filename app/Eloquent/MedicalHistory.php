<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\MedicalHistoryRelation;

class MedicalHistory extends Model
{
	use MedicalHistoryRelation;

    protected $fillable = [
    	'user_id',
    	'date_examination',
    	'content',
    	'status'
    ];
}
