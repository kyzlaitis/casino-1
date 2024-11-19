<?php

namespace App\Http\Controllers;

use App\Services\Contracts\LuckyServiceInterface;
use App\Services\LuckyService;
use Illuminate\Http\Request;
use App\Models\UserLink;
use App\Models\GameResult;
use Carbon\Carbon;

class LuckyController extends Controller
{
    protected LuckyServiceInterface $luckyService;

    public function __construct(LuckyServiceInterface $luckyService)
    {
        $this->luckyService = $luckyService;
    }


    public function imFeelingLucky($token)
    {
        $userLink = UserLink::where('token', $token)
            ->where('active', true)
            ->firstOrFail();

        if (Carbon::now()->greaterThan($userLink->expires_at)) {
            return view('link_expired');
        }

        $gameResultData = $this->luckyService->play();

        $gameResult = GameResult::create([
            'user_id'       => $userLink->user_id,
            'random_number' => $gameResultData['randomNumber'],
            'result'        => $gameResultData['result'],
            'win_amount'    => $gameResultData['winAmount'],
        ]);

        return view('imfeelinglucky_result', array_merge($gameResultData, [
            'token' => $token,
        ]));
    }

    public function history($token)
    {
        $userLink = UserLink::where('token', $token)
            ->where('active', true)
            ->firstOrFail();

        if (Carbon::now()->greaterThan($userLink->expires_at)) {
            return view('link_expired');
        }

        $history = GameResult::where('user_id', $userLink->user_id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('history', [
            'history' => $history,
            'token'   => $token,
        ]);
    }

}

