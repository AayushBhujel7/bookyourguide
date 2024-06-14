@extends('layouts.public')

@section('content')
<div class="profile-list">
    <div class="profileName">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <a href="/">Home</a> / {{$tour->title}}
                    <hr>
                    <h4>{{$tour->title}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="detail-list">
        <div class="container">
            <div class="row" style="align-items:unset">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="detail-image">
                        <img src="{{asset('images/touristarea').'/'.$tour->image}}" style="    max-height: 275px;">
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="detail-content">
                        <p>
                            <strong>City: </strong> {{$tour->city}} <br>
                            <strong>Country: </strong> {{$tour->country}} <br>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="full-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="full-detail-section">
                    {!! html_entity_decode($tour->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--profile-list-->





@endsection