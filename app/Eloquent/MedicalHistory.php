<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\MedicalHistoryRelation

class MedicalHistory extends Model
{
	use MedicalHistoryRelation;
	
    protected $fillable = [
    	'id',
    	'user_id',
    	'medical_examination',
    	'content',
    	'status'
    ];
}
