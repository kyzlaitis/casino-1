<?php

namespace App\Http\Controllers;

use App\Services\Contracts\UserLinkServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\UserLink;
use Carbon\Carbon;

class SpecialPageController extends Controller
{
    protected $userLinkService;

    public function __construct(UserLinkServiceInterface $userLinkService)
    {
        $this->userLinkService = $userLinkService;
    }

    public function show(Request $request, string $token): View
    {
        // Find the link
        $userLink = UserLink::where('token', $token)
            ->where('active', true)
            ->first();

        // Check if link exists and is not expired
        if (!$userLink || Carbon::now()->greaterThan($userLink->expires_at)) {
            return view('link_expired');
        }

        return view('special_page', ['userLink' => $userLink]);
    }

    // ...

    public function generateNewLink(Request $request, $token): RedirectResponse
    {
        // Validate current link
        $currentLink = UserLink::where('token', $token)
            ->where('active', true)
            ->firstOrFail();

        // Deactivate current link
        $currentLink->update(['active' => false]);

        // Generate new link
        $newLink = $this->userLinkService->generateUserLink($currentLink->user_id);

        // Redirect to the new link
        return redirect()->route('special.page', ['token' => $newLink->token]);
    }

    public function deactivateLink(Request $request, $token): View
    {
        $userLink = UserLink::where('token', $token)
            ->where('active', true)
            ->firstOrFail();

        $userLink->update(['active' => false]);

        return view('link_deactivated');
    }

}
