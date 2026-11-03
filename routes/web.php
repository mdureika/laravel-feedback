<?php

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $feedback = Feedback::latest()->get();

    return view('welcome', ['feedback' => $feedback]);
});

Route::post('/feedback', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    Feedback::create($validated);

    return redirect('/')->with('success', 'Feedback submitted!');
});



