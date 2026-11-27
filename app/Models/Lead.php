<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'form_id', 'page', 'locale', 'service_type', 'name', 'phone', 'email',
        'event_date', 'budget', 'comment', 'portions', 'address', 'delivery_time',
        'menu_type', 'event_type', 'guests', 'format', 'venue', 'staff',
        'ip', 'user_agent', 'mailed_at',
    ];

    protected $casts = [
        'event_date' => 'date',
        'mailed_at'  => 'datetime',
    ];
}
