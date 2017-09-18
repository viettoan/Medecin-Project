<?php

namespace App\Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Eloquent\DoctorCalender;
use App\Eloquent\MedicalHistoryRelation;
use App\Eloquent\SpeciallistRelation;
use App\Eloquent\UserRelation;

class User extends Authenticatable
{
    use Notifiable;
    use DoctorCalender;
    use MedicalHistoryRelation;
    use SpeciallistRelation;
    use UserRelation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'age',
        'sex',
        'phone',
        'address',
        'permistion',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
