<?php
namespace App\Eloquent\Relations;

use App\Eloquent\DoctorCalender;
use App\Eloquent\Media;
use App\Eloquent\MedicalHistory;
use App\Eloquent\User;

trait MedicalHistoryRelation
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'medical_history_id');
    }
}
