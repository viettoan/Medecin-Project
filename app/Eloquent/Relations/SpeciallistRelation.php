<?php
namespace App\Eloquent\Relations;

use App\Eloquent\User;

trait SpeciallistRelation
{
    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
