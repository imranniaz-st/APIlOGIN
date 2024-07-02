<?php

namespace App\Http\Controllers;

use App\Models\UserActivity; // Assuming UserActivity model is imported

class DashboardController extends Controller
{
    public function index()
    {
        $userActivities = UserActivity::where('user_id', auth()->id())->latest()->paginate(10);

        return view('dashboard', [
            'userActivities' => $userActivities,
        ]);
    }
}
