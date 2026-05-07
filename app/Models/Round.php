<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_id',
        'venue_id',
        'name',
        'date',
        'start_time',
        'end_time',
        'price',
    ];

    protected $casts = [
        'date' => 'date',
        'price' => 'decimal:2',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function spectators()
    {
        return $this->hasMany(Spectator::class);
    }

    public function availableSeats()
    {
        return $this->venue->capacity - $this->spectators()->count();
    }
}