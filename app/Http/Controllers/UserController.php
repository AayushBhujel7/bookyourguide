<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\GuideBooking;
use App\GuideFeedback;

class UserController extends Controller
{
    public function index(){
        $bookings = GuideBooking::where('from', Auth::id())->get();
        // return $bookings;
        return view('user/index', compact('bookings'));
    }

    public function givefeedback(Request $request){
        dd($request->all());
        $request->validate([
            'rating' => 'required|min:1| max: 5',
            'feedback' => 'required| min:10 |max: 500',
        ]);
        GuideFeedback::Create([
            'from' => Auth::id(),
            'to' => $request->to,
            'for' => $request->id,
            'rate' => $request->rating,
            'feedback' => $request->feedback,
            'isFeedbackGiven' => 1
        ]);

            $booking = GuideBooking::find($request->id);
            $booking->isFeedbackGiven = 1;
            $booking->save();


        return back()->with('success', 'Feedback sent seccessfully');
    }

    public function updateBooking($id, $operation){
        if($operation == "delete"){
            GuideBooking::find($id)->delete();
        }
        if($operation == "cancel"){
            $booking = GuideBooking::find($id);
            $booking->status = -2;
            $booking->save();
        }
        return back()->with('success', 'Booking Status Updated');
    }

    public function profile(){
        $me = Auth::user();
        return view('user/profile', compact('me'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            ]);
        $u = User::find(Auth::id());
        $u->name = $request->name;
        $u->email = $request->email;
        $u->save();
        return back()->with('success', 'Profile Updated');
    }

    public function changePassword(Request $request){
        $request->validate([
            'pass' => 'required|min:8|max:30',
            'c_pass' => 'required'
            ]);
        if($request->pass != $request->c_pass){
            return back()->with('error', 'Passwords do not match.');
        }

        $u = User::find(Auth::id());
        $u->password = bcrypt($request->pass);
        $u->save();
        return back()->with('success', 'You Updated thepassword');
    }
}

