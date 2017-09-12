<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
// use App\Eloquent\Relations\CategoryRelation

class MedicalHistory extends Model
{
    protected $fillable = [
    	'id',
    	'user_id',
    	'medical_examination',
    	'content',
    	'status'
    ];
}
