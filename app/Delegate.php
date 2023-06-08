<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    protected $fillable = [
        'name', 
        'city', 
        'district', 
    ];


    public function clientOrders()
    {
        return $this->hasMany(ClientInfo::class);
    }

    

}
