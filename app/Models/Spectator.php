<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectator extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'round_id',
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function round()
    {
        return $this->belongsTo(Round::class);
    }
}