<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\GuideProfile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function redirectTo(){
        
        return "/";
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('images/user'), $imageName);

        $username = strstr($data['email'], '@', true);

        $user = new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'city' => $data['city'],
                'language' => $data['language'],
                'image' => $imageName,
                'username' => $username
        ]);

        if(isset($data['isGuide'])){
            $user->role = 'guide';
        }

        $user->save();

        if(isset($data['isGuide'])){
            $userId = $user->id;
            $profile = new GuideProfile();
            $profile->user_id = $userId;
            $profile->save();
        }
        
        return $user;
    }
}
