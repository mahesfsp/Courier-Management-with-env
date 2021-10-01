<?php

namespace App\Models\Courier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public static function getallPackage(){
    	return self::all();
    }
}