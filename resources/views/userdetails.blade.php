@extends('layouts.public')

@section('content')
    <div class="profile-list">
        <div class="profileName">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <a href="/">Home</a> / {{$guide->username}}
                        <hr>
                        <h4>{{$guide->name}}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-list">
            <div class="container">
                <div class="row" style="align-items:unset">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="detail-image">
                            <img src="{{asset('images/user').'/'.$guide->image}}" style="max-height: 275px;">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="detail-content">
                            <p>
                                <strong>City: </strong> {{$guide->city}} <br>
                                <strong>Country: </strong> {{$guide->country}} <br>
                                <strong>Language: </strong> {{$guide->language}}  <br>
                                <strong>Daily Rate: </strong>
                                @if(isset($guide->guideProfile->rate_per_day))
                                    NPR. {{$guide->guideProfile->rate_per_day}}
                                @else
                                    Not Provided Yet
                                @endif
                                <br>
                                <strong>Rating: </strong>
                                @if($guide->avgrate > 0)
                                    @for($i=0; $i< $guide->avgrate; $i++)
                                        <span class=""><i class="text-warning fa fa-star"></i></span>
                                    @endfor
                                    <br>
                                @else
                                    Not Rated Yet
                                @endif
                            </p>

                            @auth
                                @if($guide->guideProfile->availability_status == 1)
                                    <button href="#" data-toggle="modal" data-target="#exampleModal">Send Request</button>
                                @else
                                    <button style="margin-top: 10px; padding: 15px;" disabled class="btn btn-large btn-info">I'm in a Trip </button>
                                @endif
                            @else
                                <button href="/login">Log In to send request</button>
                            @endauth
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
                            @if(isset($guide->guideProfile->skill_experience))
                                {!! html_entity_decode($guide->guideProfile->skill_experience) !!}
                            @else
                                No Description is provided yet
                            @endif

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
                            <h3> Reviews ( {{$guide->guideFeedback->count()}}) </h3>
                            <hr>
                            <div class="row">
                                @foreach ($guide->guideFeedback as $feedback)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>
                                                            <a class="float-left" href="#"><strong>{{ $feedback->user }}</strong></a>
                                                            @for($i=0; $i<$feedback->rate; $i++)
                                                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            @endfor
                                                        </p>
                                                        <div class="clearfix"></div>
                                                        <p>
                                                            {{ $feedback->feedback }}
                                                            <br>

                                                            <span class="text-secondary float-right">{{\Carbon\Carbon::createFromTimeStamp(strtotime($feedback->created_at))->diffForHumans()}}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--profile-list-->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request Guide Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/booking-request" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="to" value="{{$guide->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Date</label>
                                <input type="date" name="date" class="form-control" id="inputCity" placeholder = "Date of Departure" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Time</label>
                                <input type="time" name="time" class="form-control" id="inputZip" placeholder = "Time of Departure" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Number of Days</label>
                                <input type="number" name="days" class="form-control" id="inputCity" placeholder="Number of days to make booking" >
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Number of People </label>
                                <input type="number" class="form-control" id="inputEmail4" placeholder="Number of People" name="peoples" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Type Of Tour</label>
                                <select id="inputState" class="form-control" name="tourType" required>
                                    <option selected>Walking</option>
                                    <option>By Vehicle</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image"> Upload Evidence (optional) <span  style="font-size:12px"> </span></label>
                            <input id="image" type="file" class="form-control" name="evidence" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="inputAddress">Write Something</label>
                            <textarea class="form-control" id="inputAddress" rows="5" name="description" placeholder="Write something for the guide." REQUIRED></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Request</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
