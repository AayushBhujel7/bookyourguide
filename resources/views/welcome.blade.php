@extends('layouts.app')

@section('content')

   <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="intro-text">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#location" role="tab">Search by Location</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#guide" role="tab">Search by Guide</a>
              </li>
            </ul><!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="location" role="tabpanel">
                <form class="search" method="get" action="/search">
                  <input type="hidden" name="type" value="tour">
                  <input type="search" name="s" placeholder="Search by Location (title or city)">
                </form>
              </div>
              <div class="tab-pane" id="guide" role="tabpanel">
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

  <!-- Portfolio Grid -->
  <section class="bg-light" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Tourist Areas</h2>
          <h3 class="section-subheading text-muted">Best tourist area to explore.</h3>
        </div>
      </div>
      
      <div class="row">
        @foreach ($touristAreas as $area)
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" href="/tour/{{$area->slug}}">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fas fa-arrow-right fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{asset('images/touristarea').'/'.$area->image}}" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>{{$area->title}}</h4>
                <p class="text-muted">{{$area->city}}, {{$area->country}}</p>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </section>


  <!-- Team -->
  <section class="bg-light" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Guide</h2>
          <h3 class="section-subheading text-muted">Our guides to make your tour easy and memorable</h3>
        </div>
      </div>
      <div class="row">
        @foreach ($guides as $guide)
          <div class="col-sm-4">
            <div class="team-member">
              <a href="/user-detail/{{$guide->username}}">
                <img class="mx-auto rounded-circle" src="{{asset('images/user').'/'.$guide->image}}" alt="">
                <h4>{{$guide->name}}</h4>
                  <p class="text-muted">{{$guide->city}} - {{$guide->language}}</p>
                            @if($guide->avgrate > 0)
                                @for($i=0; $i< $guide->avgrate; $i++)
                                    <span class=""><i class="text-warning fa fa-star"></i></span>
                                @endfor
                                <br>
                            @else
                                Not Rated Yet
                            @endif
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
