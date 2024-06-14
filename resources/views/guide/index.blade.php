@extends('layouts.master.master')

@section('title')
    Admin Dashboard
@endsection


@section('content')


<div class="row container" style="align-items: center">
    <input type="hidden" value="{{ Auth::user()->id}}" id="authId" name="authId">
    <b  style="font-size: 20px"> I am Available? </b>
    @if($user->availability_status == 1) 
    <div class="toggle-btn active"> 
    @else 
    <div class="toggle-btn">
    @endif
        <input type="checkbox"  checked class="cb-value" />
        <span class="round-btn"></span>
    </div>
</div>

    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        N
                                    </div>
                                    <p class="card-category">New Requests</p>
                                    <h3 class="card-title">{{$newbookings}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="/guide/requests">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        A
                                    </div>
                                    <p class="card-category">Active Bookings</p>
                                    <h3 class="card-title">{{$activebookings}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="/guide/bookings">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        B
                                    </div>
                                    <p class="card-category">All Bookings</p>
                                    <h3 class="card-title">{{$bookings}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="/guide/bookings">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        F
                                    </div>
                                    <p class="card-category">All Feedbacks</p>
                                    <h3 class="card-title">{{$feedbacks}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="/guide/feedbacks">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

    </div>

<style>

</style>

<script>
$('.cb-value').click(function() {
  var mainParent = $(this).parent('.toggle-btn');
  if($(mainParent).find('input.cb-value').is(':checked')) {
    $(mainParent).addClass('active');

  } else {
    $(mainParent).removeClass('active');
  }
            $.ajax({
               type:'POST',
               url:'/api/toggleAvailability',
               data: {
                     id: jQuery('#authId').val(),
                  },
               success:function(data) {
                  console.log(data)
               }
            });

})
</script>
@endsection
