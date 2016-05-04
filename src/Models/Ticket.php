<?php

namespace Sparkie\Support\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $appends = ['readable_status', 'status_label'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getReadableStatusAttribute()
    {
        switch($this->status) {
            case 'new':
                return config('support.statuses.new.text', 'New');
            case 'awaiting_customer':
                return config('support.statuses.awaiting_customer.text', 'Awaiting Customer');
            case 'awaiting_reply':
                return config('support.statuses.awaiting_reply.text', 'Awaiting Reply');
            case 'closed':
                return config('support.statuses.closed.text', 'Closed');
        }
    }

    public function getStatusLabelAttribute()
    {
        switch($this->status) {
            case 'new':
                $class = config('support.statuses.new.class', 'success');
                break;
            case 'awaiting_customer':
                $class = config('support.statuses.awaiting_customer.class', 'info');
                break;
            case 'awaiting_reply':
                $class = config('support.statuses.awaiting_reply.class', 'warning');
                break;
            case 'closed':
                $class = config('support.statuses.closed.class', 'danger');
                break;
        }

        return 'label-' . $class;
    }
}
