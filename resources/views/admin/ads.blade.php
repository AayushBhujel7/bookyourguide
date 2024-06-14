@extends('layouts.master.master')

@section('title')
    Ads Setting
@endsection


@section('content')

<div class="row">

	<div class="col-md-12">

		@include('errors')


                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Top Side Ad</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/admin/ads/create" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$top->id}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="bmd-label-floating">Show Ad?</label>
                                                    <input type="checkbox" name="status" class="form-control" @if($top->status == 1) checked @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="bmd-label-floating">Show Image Banner?</label>
                                                    <input type="checkbox" name="isImage" class="form-control" @if($top->isBanner == 1) checked @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Select Banner</label>
                                                    <input type="file" name="image" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Insert Ads Code</label>
                                                    <textarea class="form-control" id="inputAddress" rows="5" name="adcode" placeholder="Insert Ads code">
                                                    {{ $top->adcode }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <img src="{{asset('images/ad').'/'.$top->image}}" class="img-responsive">
                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Update Ad</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Bottom Side Ad</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/admin/ads/create" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$bottom->id}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="bmd-label-floating">Show Ad?</label>
                                                    <input type="checkbox" name="status" class="form-control" @if($bottom->status == 1) checked @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Show Image Banner?</label>
                                                    <input type="checkbox" name="isImage" class="form-control" @if($bottom->isBanner == 1) checked @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Select Banner</label>
                                                    <input type="file" name="image" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Insert Ads Code</label>
                                                    <textarea class="form-control" id="inputAddress" rows="5" name="adcode" placeholder="Insert Ads code">
                                                        {{$bottom->adcode }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <img src="{{asset('images/ad').'/'.$bottom->image}}" class="img-responsive">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Update Ad</button>
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