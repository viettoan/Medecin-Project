<?php
namespace App\Eloquent\Relations;

use App\Eloquent\User;
use App\Eloquent\DoctorCalender;

trait DoctorCalender
{
    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
