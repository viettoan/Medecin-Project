<?php
namespace App\Eloquent\Relations;

use App\Eloquent\DoctorCalender;
use App\Eloquent\Media;
use App\Eloquent\MedicalHistory;
use App\Eloquent\User;

trait MedicalRelation
{
    public function historyMedia()
    {
        return $this->belongsTo(MedicalHistory::class, 'medical_history_id');
    }
}
