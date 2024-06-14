<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuideFeedback;

class GuideFeedbackController extends Controller
{
    // Display feedback for a guide
    public function showFeedback($guideId)
    {
        $feedback = GuideFeedback::where('to', $guideId)->get();
        return view('feedback.show', ['feedback' => $feedback]);
    }

    // Submit new feedback
    public function submitFeedback(Request $request)
{
    // Validation logic
    $request->validate([
        'id' => 'required|numeric',
        'to' => 'required|numeric',
        'rating' => 'required|numeric|min:1|max:5',
        'feedback' => 'required|string',
    ]);

    // Store the feedback in the database
    GuideFeedback::create([
        'from' => $request->input('id'),
        'to' => $request->input('to'),
        'rate' => $request->input('rating'),
        'feedback' => $request->input('feedback'),
        'for' => 'some_value', // Adjust as needed
    ]);

    return redirect()->back()->with('success', 'Feedback submitted successfully!');
}

}
