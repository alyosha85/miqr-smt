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
    public function garts()
    {
        return $this->belongsTo(Gart::class,'gart_id','id');
    }
    public function amgs()
    {
        return $this->belongsTo(Amg::class,'amg_id','id');
    }




}
