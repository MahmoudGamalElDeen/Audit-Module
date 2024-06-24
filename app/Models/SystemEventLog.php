<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemEventLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_type',
        'event_details',
    ];
}
