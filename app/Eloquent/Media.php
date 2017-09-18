<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\MedicalRelation;
use App\Eloquent\Relations\MedicalHistoryRelation;

class Media extends Model
{
	use MedicalRelation;
	use MedicalHistoryRelation;
	
    protected $fillable = [
    	'id',
    	'path',
    	'medical_history_id',
    	'type',
    	'description',
    	'status'
    ];
}
