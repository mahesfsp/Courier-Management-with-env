<?php

namespace App\Models\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'statuses';
    public static function getallStatus(){
    	return self::all();
    }

    public function courieractionStatus()
    {
        return $this->hasMany(CourierAction::class);
    }
}
