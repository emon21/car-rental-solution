<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relationship
    public function car()
    {
        return $this->belongsTo(Car::class,'car_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
