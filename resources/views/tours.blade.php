@extends('layouts.public')

@section('content')

<header class="masthead">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="intro-text" style="padding: 100px 0;">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#location" role="tab">Search by Location</a>
              </li>
            </ul><!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="location" role="tabpanel">
                <form class="search" method="get" action="/search">
                  <input type="hidden" name="type" value="tour">
                  <input type="search" name="s" placeholder="Search by Location (title or city)">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>


<div class="detail-list">
  @if(!$tours->isEmpty())
    @foreach($tours as $tour)
        <div class="container tour-list">
            <a href="/tour/{{$tour->slug}}" style="color: #000;text-decoration: none;">
            <div class="row" style="align-items:unset">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="detail-image">
                            <img src="{{ asset('images/touristarea').'/'.$tour->image }}" style="max-height: 275px;">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12">
                        <div class="detail-content">
                            <p style="font-size: 16px;">
                                <strong style="font-size: 24px;text-transform: uppercase;">{{$tour->title}}</strong> <br>
                                {{ substr($tour->description,0, 100) }} <br>
                                {{$tour->city}}, {{$tour->country}}
                            </p>
                        </div>
                    </div>
            </div>
            </a>
        </div>
    @endforeach   
    <div class="container"> 
        {{ $tours->links() }} 
    </div>
  @else
    <div class="container tour-list">
      <h3 style="text-align: center"> NO record Found. </h3>
    </div>
  @endif
</div>


@endsection