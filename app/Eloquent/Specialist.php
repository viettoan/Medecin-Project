<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
// use App\Eloquent\Relations\CategoryRelation

class Specialist extends Model
{
	protected $fillable = [
		'id',
		'name',
		'user_id',
		'status'
	]
}
