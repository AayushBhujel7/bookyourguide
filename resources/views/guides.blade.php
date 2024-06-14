@extends('layouts.public')

@section('content')

<header class="masthead">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="intro-text" style="padding: 100px 0;">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#guide" role="tab">Search by Guide</a>
              </li>
            </ul><!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="guide" role="tabpanel">
                <!-- <form class="search" method="get" action="/search" class="form-inline">
                  <input type="search" name="s" placeholder="Search by Guide">
                </form> -->
                <form class="form-inline" method="get" action="/search">
                  <input type="hidden" name="type" value="guide">
                <div class="form-group" style="margin-right: 10px;">
                  <input type="text" name="s" placeholder="Enter Guide name">
                </div>
                <div class="form-group" style="margin-right: 10px;">
                  <input type="text" name="city" placeholder="Enter City">
                </div>
                <div class="form-group" style="margin-right: 10px;">
                  <input type="text" name="language" placeholder="Enter Language">
                </div>
                <button type="submit" class="btn btn-success btn-large" style="padding: 16px;">Search</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>


<div class="detail-list">
@if(!$users->isEmpty())
    @foreach($users as $user)
        <div class="container tour-list">
            <a href="/user-detail/{{$user->username}}" style="color: #000;text-decoration: none;">
            <div class="row" style="align-items:unset">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="detail-image">
                            <img src="{{ asset('images/user').'/'.$user->image }}" style="max-height: 275px;">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12">
                        <div class="detail-content">
                            <p style="font-size: 16px;">
                                <strong style="font-size: 24px;text-transform: uppercase;">{{$user->name}}</strong> <br>
                                <strong>Language:</strong> {{ $user->language }} <br>
                                <strong>Daily Rate: </strong> 
                                @if(isset($user->guideProfile->rate_per_day))
                                    NPR. {{$user->guideProfile->rate_per_day}}
                                @else
                                    Not Provided Yet
                                @endif
                                <br>
                                <strong>Rating: </strong>
                                @if($user->avgrate > 0)
                                    @for($i=0; $i< $user->avgrate; $i++)
                                        <span class=""><i class="text-warning fa fa-star"></i></span>
                                    @endfor
                                @else
                                    Not Rated Yet
                                @endif
                                <br/>
                                {{$user->city}}, {{$user->country}}
                            </p>
                        </div>
                    </div>
            </div>
            </a>
        </div>
    @endforeach    
    <div class="container"> 
        {{ $users->links() }} 
    </div>

  @else
    <div class="container tour-list">
      <h3 style="text-align: center"> NO record Found. </h3>
    </div>
  @endif
</div>


@endsection