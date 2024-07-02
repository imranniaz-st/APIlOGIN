<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabInfoController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'tabInfo' => 'required|array',
            'remainingWorkTime' => 'required|string',
        ]);

        // Process and save the data as needed
        // For example, you might save it to the database or perform some other actions
        // Here, we'll just log it for demonstration purposes
        \Log::info('Tab Info:', $validated['tabInfo']);
        \Log::info('Remaining Work Time:', ['remainingWorkTime' => $validated['remainingWorkTime']]);

        return response()->json(['message' => 'Tab info saved successfully']);
    }
}
