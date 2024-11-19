<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
    protected $fillable = [
        'user_id', 'random_number', 'result', 'win_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
