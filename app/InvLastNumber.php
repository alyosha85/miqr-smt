<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvLastNumber extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function room()
    {
        return $this->hasMany(InvRoom::class,'location_id','location_id');

    }
}
