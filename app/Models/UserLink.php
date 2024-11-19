<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLink extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'expires_at',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
