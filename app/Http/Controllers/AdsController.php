<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
class AdsController extends Controller
{
    public function index(){
        $top = Ad::find(1);
        $bottom = Ad::find(2);
        return view('admin/ads', compact('top', 'bottom'));
    }

    public function create(Request $request){
        $ad = Ad::find($request->id);

        if(isset($request->isImage)){
            $ad->isBanner = 1;
        }else{
            $ad->isBanner = 0;
        }

        if(isset($request->status)){
            $ad->status = 1;
        }else{
            $ad->status = 0;
        }

        $ad->adcode = $request->adcode;
        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/ad'), $imageName);
            $ad->image = $imageName;
        }

        $ad->save();
        
        return back()->with('success', 'Add Created Successfully');
    }
}
