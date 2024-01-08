<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected $fillable = [
        'event_name',
        'begin_time',
        'end_time',
        'street_name',
        'house_number',
        'postal_code',
        'amount_of_volunteers_needed',
        'description'
    ];
    function users() {
        return $this->belongsToMany(User::class);
    }
}
