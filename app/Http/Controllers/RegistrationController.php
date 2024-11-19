<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\Contracts\UserLinkServiceInterface;
use App\Services\UserLinkService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLink;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RegistrationController extends Controller
{

    protected UserLinkService $userLinkService;

    public function __construct(UserLinkServiceInterface $userLinkService)
    {
        $this->userLinkService = $userLinkService;
    }

    public function showRegistrationForm(): View
    {
        return view('register');
    }

    public function register(RegisterUserRequest $request): View
    {
        $user = User::create([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
        ]);

        // Generate user link using the service
        $userLink = $this->userLinkService->generateUserLink($user->id);

        $link = route('special.page', ['token' => $userLink->token]);

        // Return the link to the user
        return view('registration_success', ['link' => $link]);
    }
}
