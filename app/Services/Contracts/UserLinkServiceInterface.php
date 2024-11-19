<?php

namespace App\Services\Contracts;

use App\Models\UserLink;

interface UserLinkServiceInterface
{
    public function generateUserLink($userId): UserLink;
}
