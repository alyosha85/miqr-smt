<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvAbItem extends Model
{
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTO(Location::class);
    }
}
