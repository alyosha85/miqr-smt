<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Ticket extends Model
{
  use SoftDeletes, Commentable;


  public function user()
  {
    return $this->belongsTo('App\User','assignedTo','id');
  }
  public function invitem()
  {
    return $this->belongsTo('App\InvItems','gname_id','id');
  }
  public function ticket_status()
  {
    return $this->belongsTo('App\TicketStatus','ticket_status_id','id');
  }
  public function ticket_priority()
  {
    return $this->belongsTo('App\TicketPriority','priority_id','id');
  }

}
