<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
// use App\Eloquent\Relations\CategoryRelation;

class Contact extends Model
{
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'content',
        'status'
    ];
}
