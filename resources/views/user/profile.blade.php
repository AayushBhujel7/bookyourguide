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
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/admin/updateProfile">
                                    	{{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Display Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{$me->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email address</label>
                                                    <input type="email" name="email" class="form-control" value="{{$me->email}}">
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
                                    <form method="post" action="/admin/changePassword">
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

@endsection