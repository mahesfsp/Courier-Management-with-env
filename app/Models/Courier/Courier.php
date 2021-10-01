<?php

namespace App\Models\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $table = 'couriers';
    protected $fillable = ['sender_name', 'sender_contact', 'sender_address', 'sender_city','sender_state', 'sender_pin', 'sender_country', 'recipient_name','recipient_contact', 'recipient_address', 'recipient_city', 'recipient_state','recipient_pin','recipient_country','courier_desc','package_id'];
    
    public static function getCourierbytracking($id){    

        $couriers=  self::with(['courierActions'=>
        function ($query) {
            $query->orderBy('id', 'DESC');
            $query->with('courierStatus');
            
         } ])
        ->where('tracking_no', $id)   
        ->get()
        ->first();
        if(!empty($couriers)){
            return $couriers->toArray();
        }
        
    }
    
    public function courierActions()
    {
        return $this->hasMany(CourierAction::class, 'courier_id', 'id');
    }
 
}
