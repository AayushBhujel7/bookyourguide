@extends('layouts.master.master')

@section('title')
    User
@endsection

@section('content')
@include('errors')
<div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">All Bookings</h4>
            </div>
            <div class="card-body">

            <div class="table-responsive">
                                        <table class="table" id="bookings" width="100%">
                                            <thead class=" text-primary">
                                                <th>
                                                    To
                                                </th>
                                                <th>
                                                    Tour Date
                                                </th>
                                                <th>
                                                	Type
                                                </th>
                                                <th>
                                                	Status
                                                </th>
                                                <th>
                                                	Evidence
                                                </th>
                                                <th>
                                                	Created At
                                                </th>
                                                <th>
                                                	Action
                                                </th>
                                            </thead>
                                            <tbody>

                                                @foreach($bookings as $m)

                                                <tr
                                                    @if($m->status <0) style="text-decoration: line-through;" @endif
                                                    @if($m->status == 10) style="color: green;" @endif
                                                >
                                                    <td>
                                                        <a href="/user-detail/{{$m->tousername}}" target="_blank">{{$m->toname}}</a>
                                                    </td>
                                                    <td>
                                                        {{$m->tour_date}} {{$m->time}} - {{$m->days}} Days
                                                    </td>
                                                    <td>
                                                        {{$m->type_of_tour}} ({{$m->number_of_people}})
                                                    </td>
                                                    <td>
                                                        @if($m->status == -1)
                                                            Rejected
                                                        @endif
                                                        @if($m->status == 0)
                                                            Pending
                                                        @endif
                                                        @if($m->status == 1)
                                                            Accepted
                                                        @endif
                                                        @if($m->status == -2)
                                                            Cancelled
                                                        @endif
                                                        @if($m->status == 10)
                                                            Completed
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{asset('images/booking').'/'.$m->evidence}}" target="_blank">
                                                    	    {{ $m->evidence}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                    	{{ $m->created_at}}
                                                    </td>
                                                    <td>
                                                        @if($m->status == 10)
                                                            @if($m->isFeedbackGiven == 0)
                                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#feedback{{$m->id}}">
                                                                    Feedback
                                                                </a>
                                                            @else
                                                                <a href="#" class="btn btn-success" >
                                                                    Feedback Given
                                                                </a>
                                                            @endif
                                                        @elseif($m->status == 1)
                                                            <a href="#" class="btn btn-success ">
                                                                In Progress
                                                            </a>
                                                        @elseif($m->status == 0)
                                                            <a href="/user/updateBooking/{{$m->id}}/cancel" class="btn btn-info ">
                                                                Cancel
                                                            </a>
                                                        @elseif($m->status < 0)
                                                            <a href="/user/updateBooking/{{$m->id}}/delete" class="btn btn-danger ">
                                                                Delete
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="feedback{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Leave Feedback</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="/user/givefeedback" enctype="multipart/form-data">
                                                            @csrf
                                                                <input type="hidden" value="{{$m->id}}" name="id">
                                                                <input type="hidden" value="{{$m->to}}" name="to">
                                                                <input type="hidden" value="3" name="rating" id="rating">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputCity">Rate *</label>
                                                                          <!-- Rating Stars Box -->
                                                                            <div class='rating-stars text-center'>
                                                                                <ul id='stars'>
                                                                                <li class='star' title='Poor' data-value='1'>
                                                                                    <i class='fa fa-star fa-fw'></i>
                                                                                </li>
                                                                                <li class='star' title='Fair' data-value='2'>
                                                                                    <i class='fa fa-star fa-fw'></i>
                                                                                </li>
                                                                                <li class='star' title='Good' data-value='3'>
                                                                                    <i class='fa fa-star fa-fw'></i>
                                                                                </li>
                                                                                <li class='star' title='Excellent' data-value='4'>
                                                                                    <i class='fa fa-star fa-fw'></i>
                                                                                </li>
                                                                                <li class='star' title='WOW!!!' data-value='5'>
                                                                                    <i class='fa fa-star fa-fw'></i>
                                                                                </li>
                                                                                </ul>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-group">
                                                                    <label for="inputAddress">Feedback *</label>
                                                                    <textarea class="form-control" id="inputAddress" rows="5" name="feedback" placeholder="Leave your feedback" REQUIRED></textarea>
                                                                </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send Request</button>
                                                        </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                    </div>
            </div>
        </div>



<script>
$(document).ready(function() {
    $('#bookings').DataTable({"pagingType": "full_numbers"});
} );

$(document).ready(function(){
    $(':input[type="submit"]').prop('disabled', true);
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });


  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'),10);
    var msg = "";
    $("#rating").val(ratingValue);
    $(':input[type="submit"]').prop('disabled', false);
  });
});

</script>

<style>

/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;

  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;

}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

</style>
@endsection
