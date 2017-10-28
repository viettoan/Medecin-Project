<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\SpeciallistRelation;

class Specialist extends Model
{
	use SpeciallistRelation;
	
	protected $fillable = [
		'id',
		'name',
		'status',
		'image',
		'description'
	];
}
