<?php

namespace App\Http\Middleware;

use App\Models\UserLink;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheckActiveLink
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->route('token');

        $userLink = UserLink::where('token', $token)
            ->where('active', true)
            ->first();

        if (!$userLink || Carbon::now()->greaterThan($userLink->expires_at)) {
            return redirect()->route('link.expired');
        }

        $request->attributes->add(['userLink' => $userLink]);

        return $next($request);
    }
}
