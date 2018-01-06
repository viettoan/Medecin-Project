<?php
namespace App\Eloquent\Relations;

use App\Eloquent\DoctorCalender;

trait RoomRelation
{
    public function doctorCalender()
    {
        return $this->hasMany(DoctorCalender::class, 'room_id');
    }
}
