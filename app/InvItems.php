<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvItems extends Model
{
    protected $guarded = [];

    public function invroom ()
    {
        return $this->belongsTo(InvRoom::class);
    }
}
