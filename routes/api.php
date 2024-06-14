<?php

use Illuminate\Http\Request;
use App\GuideProfile;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/toggleAvailability', function (Request $request) {

    $user = GuideProfile::where('user_id', $request->id)->first();
    if($user->availability_status == 1){
        $user->availability_status = 0;
    }else{
        $user->availability_status = 1;
    }
    $user->save();

    return $user->availability_status;
});