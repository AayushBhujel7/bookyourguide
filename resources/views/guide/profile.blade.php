@extends('layouts.master.master')

@section('title')
    Edit Profile
@endsection


@section('content')

<div class="row">

	<div class="col-md-12">

        @include('errors')
        
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Update Profile Detail</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="/guide/updateProfileDetail" enctype="multipart/form-data">
                                    	{{csrf_field()}}
                                        <div class="row">
                                        @if ($profile)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Rate Per Day (NRs.)</label>
                                                    <input type="number" class="form-control" name="rate_per_day" value="<?php echo e(old('rate_per_day', $profile->rate_per_day)); ?>" required>
                                                    @error('rate_per_day')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">License Image</label>
                                                    <input type="file" class="form-control" name="certificate_image" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <img src="{{ asset('images/certificates').'/'.$profile->certificate_image }}" width="200px">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                            <label class="bmd-label-floating">Skill and Experience </label>
                                            <textarea class="form-control ckeditor HTML" id="inputAddress" rows="5" name="skills" placeholder="Write something about you. It will be displayed in your profile" required>
                                            <?php echo $profile->skill_experience; ?>
                                            </textarea>
                                            </div>
                                            </div>
                                            @else
                            <p>No profile found.</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/guide/updateProfile" enctype="multipart/form-data">
                                    	{{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Usernam Name</label>
                                                    <input type="text" disabled class="form-control" value="{{$me->username}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Display Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{$me->name}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email address</label>
                                                    <input type="email" name="email" class="form-control" value="{{$me->email}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Image</label>
                                                    <input type="file" class="form-control" name="image">
                                                    <br>
                                                    <img src="{{asset('images/user').'/'.$me->image}}" width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">City ({{$me->country}}</label>
                                                    <input type="text" class="form-control" name="city" value="{{$me->city}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Languages (separated by comma)</label>
                                                    <input type="text" name="language" class="form-control" value="{{$me->language}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/guide/changePassword">
                                    	{{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">New Password</label>
                                                    <input type="password" class="form-control" name="pass" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Confirm Password</label>
                                                    <input type="Password" class="form-control" name="c_pass" value="" >
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Update Password</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>

								
</div>


<style>
.form-group input[type=file] {
    opacity: 1 !important;
    position: unset !important;
    z-index: 1 !important;
}
</style>
@endsection