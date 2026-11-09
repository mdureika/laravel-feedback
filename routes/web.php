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

Route::get('/feedback/{feedback}/edit', function (Feedback $feedback) {
    return view('feedback-edit', ['entry' => $feedback]);
});

Route::put('/feedback/{feedback}', function (Request $request, Feedback $feedback) {
    $validated =  $request->validate([
    'name' => ['required', 'string', 'max:255'],
    'message' => ['required', 'string', 'max:5000'],
    ]);

    $feedback->update($validated);
    return redirect('/')->with('success', 'Feedback updated!');    
});

Route::delete('/feedback/{feedback}', function (Feedback $feedback) {
    $feedback->delete();
    return redirect('/')->with('success', 'Entry deleted!');
});
