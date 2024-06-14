<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\TouristArea;
use App\User;
use App\GuideBooking;

use Illuminate\Support\Facades\Mail;
use App\Mail\BookingRequestEmail;

class PublicController extends Controller
{
    public function index(){
        $touristAreas = TouristArea::skip(0)->take(6)->inRandomOrder()->get();
        $guides = User::where('role', 'guide')->skip(0)->take(6)->inRandomOrder()->get();
        // return $guides;
        return view('welcome', compact('touristAreas', 'guides'));
    }

    public function userdetails($username){
        $guide = User::where('username', $username)
                        ->with('guideProfile')
                        ->with('guideFeedback')
                        ->first();
        $avgRate =  round($guide->guideFeedback->avg('rate'), 0);
        return view('userdetails', compact('guide', 'avgRate'));
    }

    public function tourdetails($slug){
        $tour = TouristArea::where('slug', $slug)
                                ->first();
        return view('tourdetails', compact('tour'));
    }

    public function tours(){
        $tours = TouristArea::
            paginate(5);

            // return $tours;
        return view('tours', compact('tours'));
    }

    public function guides(){
        $users = User::with('guideFeedback')
            ->where('role', 'guide')
            ->with('guideProfile')
            ->paginate(5);
        // return $users;

        return view('guides', compact('users'));
    }


    public function search(Request $request){
        if(isset($request->type)){
            $type = $request->type;
            $arg = $request->s;

            if($type== 'guide'){
                $response = User::where('role', 'guide');
                if(isset($request->s)){
                    $response-> where('name', 'like', '%' . $arg. '%')->orWhere('username', 'like', '%' . $arg. '%');
                }
                if(isset($request->city)){
                    $response-> where('city', 'like', '%' . $request->city. '%');
                }
                if(isset($request->language)){
                    $response-> where('language', 'like', '%' . $request->language. '%');
                }
                $users = $response->with('guideProfile')
                                ->paginate(5);

                return view('guides', compact('users'));
                            
            }
            else if($type== 'tour'){
                $tours = TouristArea::where('title', 'like', '%' . $arg. '%')
                            ->orWhere('city', 'like', '%' . $arg. '%')
                            ->orWhere('country', 'like', '%' . $arg. '%')
                            ->paginate(5);

                return view('tours', compact('tours'));

            }
            else{
                return redirect()->route('tours');
            }
        }else{
            return redirect()->route('tours');
        }
    }



    public function bookingRequest(Request $request){

        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'days' => 'required|integer|min:0',
            'peoples' => 'required|integer|min:0',
            'tourType' => 'required',
            'description' => 'required| min:10 |max: 500',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',

        ], [
            'date.required' => 'Name is required',
            'days.required' => 'Password is required'

        ]);

        $booking = new GuideBooking();
        $booking->from = Auth::user()->id;
        $booking->to = $request->to;
        $booking->tour_date = $request->date;
        $booking->time = $request->time;
        $booking->days = $request->days;
        $booking->number_of_people = $request->peoples;
        $booking->type_of_tour = $request->tourType;
        $booking->description = $request->description;

        if(isset($request->evidence)){
            $imageName = time().'.'.$request->evidence->getClientOriginalExtension();
            $request->evidence->move(public_path('images/booking'), $imageName);
            $booking->evidence = $imageName;
        }
        $booking->save();

        $guide = User::find($request->to);
        $data['booking'] = $booking;
        $data['guide'] = $guide;
        $data['user'] = Auth::user();
        $data['guide_email'] = $guide->email;


        Mail::to($guide->email)->send(new BookingRequestEmail($data));

        // return $data;
        return back()->with('success', 'Booking request has been sent successfully.');
    }
}
