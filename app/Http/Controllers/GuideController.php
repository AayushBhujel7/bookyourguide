<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\GuideFeedback;
use App\GuideBooking;
use App\GuideProfile;
use Illuminate\Support\Str;

class GuideController extends Controller
{
    public function index(){
        $user = GuideProfile::where('user_id', Auth::id())->first();
        $feedbacks = GuideFeedback::where('to', Auth::id())->count();
        $newbookings = GuideBooking::where('to', Auth::id())->where('status', '0')->count();
        $activebookings = GuideBooking::where('to', Auth::id())->where('status', '1')->count();
        $bookings = GuideBooking::where('to', Auth::id())->count();
        return view('guide/index', compact('feedbacks','bookings', 'newbookings', 'activebookings', 'user'));
    }

    public function requests(){
        $requests = GuideBooking::where('to', Auth::id())->where('status', '0')->paginate(5);
        return view('guide/requests', compact('requests'));
    }

    public function selectRequest($id, $operation){
        if($operation == "select"){
            $booking = GuideBooking::find($id);
            $booking->status = 1;
            $booking->save();

            GuideBooking::where('to', Auth::id())->where('status', '0')->update(['status'=>'-1']);

            $user = GuideProfile::where('user_id', Auth::id())->first();
            $user->availability_status = 0;
            $user->save();

            return back()->with('success', 'Booking Request Accepted');
        }
        return back()->with('error', 'Booking request could not be accepted');
    }

    public function bookings(){
        $activebooking = GuideBooking::where('to', Auth::id())->where('status', '1')->first();
        $bookings = GuideBooking::where('to', Auth::id())->where('status','!=', '1')->get();
        return view('guide/bookings', compact('bookings', 'activebooking'));
    }

    public function feedbacks(){
        $feedbacks = GuideFeedback::where('to', Auth::id())->paginate(5);
        return view('guide/feedbacks', compact('feedbacks'));
    }

    public function markascomplete($id){
            $booking = GuideBooking::find($id);
            $booking->status = 10;
            $booking->save();

            $user = GuideProfile::where('user_id', Auth::id())->first();
            $user->availability_status = 1;
            $user->save();

            return back()->with('success', 'Tour Booking has been marked ac completed');
    }

    public function profile(){
        $me = Auth::user();
        $profile = GuideProfile::find(Auth::id());
        return view('guide/profile', compact('me', 'profile'));
    }

    public function updateProfileDetail(Request $request){
        $request->validate([
            'rate_per_day' => 'required|integer',
            'skills' => 'required|min:10 ',
            ]);

        $u = GuideProfile::where('user_id', Auth::id())->first();
         // If not, create a new profile
        if (!$u) {
        $u = new GuideProfile();
        $u->user_id = Auth::id();
        }
        $u->rate_per_day = $request->rate_per_day;
        $u->skill_experience = $request->skills;
        if($request->hasFile('certificate_image')) {
            $imageName = time().'.'.$request->file('certificate_image')->getClientOriginalExtension();
            $request->file('certificate_image')->move(public_path('images/certificates'), $imageName);
            $u->certificate_image = $imageName;
        }
        $u->save();
        return back()->with('success', 'Profile Updated');
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required| min:1 |max:50',
            'email' => 'required|email',
            'city' => 'required| min:1 |max:50',
            'language' => 'required| min:1 |max:100',
            ]);

        $u = User::find(Auth::id());
        $u->name = $request->name;
        $u->email = $request->email;
        $u->city = $request->city;
        $u->language = $request->language;
        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/user'), $imageName);
            $u->image = $imageName;
        }
        $u->save();
        return back()->with('success', 'Profile Updated');
    }

    public function changePassword(Request $request){
        $request->validate([
            'pass' => 'required|min:8|max:30|',
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
