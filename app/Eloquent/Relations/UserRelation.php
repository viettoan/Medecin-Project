<?php
namespace App\Eloquent\Relations;

use App\Eloquent\Specialist;
use App\Eloquent\MedicalHistory;
use App\Eloquent\User;

trait UserRelation
{
    public function histories()
    {
        return $this->hasMany(MedicalHistory::class, 'user_id');
    }

    public function specialists()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

    public function doctorCalender()
    {
        return $this->hasMany(DoctorCalender::class, 'user_id');
    }
}
