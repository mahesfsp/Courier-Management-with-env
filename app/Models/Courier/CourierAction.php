<?php

namespace App\Models\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierAction extends Model
{
    use HasFactory;
    public function courierData()
    {
        return $this->belongsTo(Courier::class, 'id', 'courier_id');
    }
    public function courierStatus()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
