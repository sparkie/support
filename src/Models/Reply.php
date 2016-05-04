<?php

namespace Sparkie\Support\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
