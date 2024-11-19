<?php

namespace App\Services;

use App\Services\Contracts\LuckyServiceInterface;

class LuckyService implements LuckyServiceInterface
{

    public function play(): array
    {
        $randomNumber = rand(1, 1000);

        $result = $randomNumber % 2 === 0 ? 1 : 0;

        $winAmount = 0;
        if ($result) {
            if ($randomNumber > 900) {
                $winAmount = $randomNumber * 0.7;
            } elseif ($randomNumber > 600) {
                $winAmount = $randomNumber * 0.5;
            } elseif ($randomNumber > 300) {
                $winAmount = $randomNumber * 0.3;
            } else {
                $winAmount = $randomNumber * 0.1;
            }
        }

        return [
            'randomNumber' => $randomNumber,
            'result'       => $result,
            'winAmount'    => $winAmount,
        ];
    }
}
