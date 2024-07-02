
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('cors')->group(function () {
    Route::post('/login', function (Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    });

    Route::post('/save-tab-info', function (Request $request) {
        $data = $request->all();

        // Process and store tab information here

        return response()->json(['message' => 'Tab info saved successfully'], 200);
    })->middleware('auth:sanctum');

    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    })->middleware('auth:sanctum');
});
