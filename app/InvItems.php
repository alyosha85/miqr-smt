<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvItems extends Model
{
    protected $guarded = [];

    public function invroom()
    {
        return $this->belongsTo(InvRoom::class,'room_id','id');
    }
    public function garts()
    {
        return $this->belongsTo(Gart::class,'gart_id','id');
    }
}
