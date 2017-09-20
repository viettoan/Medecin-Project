<?php

namespace App\Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Eloquent\Relations\UserRelation;

class User extends Authenticatable
{
    use Notifiable;
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

    /**
     * Pham Viet Toan
     * 09/19/2017
     * Check Permission
     * @param
     * @return boolean
     */
    public function checkPermission()
    {
        return $this -> permistion == config('custom.admin');
    }

    /**
     * Pham Viet Toan
     * 09/20/2017
     *
     * set value password when store in database
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
