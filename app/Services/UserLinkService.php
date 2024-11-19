<?php

namespace App\Services;

use App\Models\UserLink;
use App\Services\Contracts\UserLinkServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserLinkService implements UserLinkServiceInterface
{
    public function generateUserLink($userId): UserLink
    {
        $token = Str::random(64);
        $expiresAt = Carbon::now()->addDays(7);

        return UserLink::create([
            'user_id'    => $userId,
            'token'      => $token,
            'expires_at' => $expiresAt,
            'active'     => true,
        ]);
    }
}
