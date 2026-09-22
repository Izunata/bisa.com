<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user()->load('enrollments.skill');
        return Inertia::render('Dashboard', [
            'user' => $user,
            'enrollments' => $user->enrollments,
            'stats' => ['streak' => $user->streak_days, 'xp' => $user->xp, 'completed' => $user->enrollments->where('progress', 100)->count()],
        ]);
    }
}