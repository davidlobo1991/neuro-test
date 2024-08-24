<?php

namespace App\Http\Controllers;

use App\Services\Providers\SessionScoresProvider;
use Illuminate\Support\Facades\Auth;

class SessionScoreController extends Controller
{
    private SessionScoresProvider $sessionScoresProvider;
    public function __construct(SessionScoresProvider $sessionScoresProvider)
    {
        $this->sessionScoresProvider = $sessionScoresProvider;
    }

    public function index()
    {
        $userId = Auth::id();
        $sessionScore = $this->sessionScoresProvider->provide($userId);

        return response(json_encode($sessionScore), 200)
            ->header('Content-Type', 'text/json');
    }
}
