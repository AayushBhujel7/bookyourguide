<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Auth;
use App\User;
use App\TouristArea;
use App\GuideBooking;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class adminController extends Controller
{
    public function index(){
        $users = User::where('role', 'user')->count();
        $guides = User::where('role', 'guide')->count();
        $bookings = GuideBooking::count();
        $tours = TouristArea::count();
        // return $data;
        return view('admin/index', compact('users', 'guides','bookings','tours'));
    }

    public function profile(){
        $me = Auth::user();
        return view('admin/profile', compact('me'));
    }

    public function tours(){
        $tours = TouristArea::get();
        return view('admin/list', compact('tours'));
    }

    public function addTour(Request $request){
        $request->validate([
            'title' => 'required|min:10| max: 150',
            'description' => 'required| min:10 |max: 500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'city' => 'required|min:1| max: 50',
            'country' => 'required|min:1| max: 50',
        ]);

        $area = new TouristArea();
        $area->title = $request->title;
        $area->slug = Str::slug($request->title , '-');
        $area->description = $request->description;
        $area->city = $request->city;
        $area->country = $request->country;
        
        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/touristarea'), $imageName);
            $area->image = $imageName;
        }else{
            $area->image = "default.jpg";
        }
        
        $area->save();

        return back()->with('success', 'Tourist Area Added Successfully.');
    }


    public function deletetours($id){
        TouristArea::find($id)->delete();
        return back()->with('success', 'Tourist Area Deleted Successfully.');
    }

    public function users(){
        $users = User::where('role', 'guide')->orWhere('role','user')->with('guideProfile')->get();

        // return $users;
        return view('admin/list', compact('users'));
    }
    public function deleteuser($id){
        User::find($id)->delete();
        return back()->with('success', 'User Deleted Successfully.');
    }

    public function bookings(){
        $bookings =  GuideBooking::get();
        // return $bookings;
        return view('admin/list', compact('bookings'));
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
