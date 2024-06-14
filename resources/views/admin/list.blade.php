@extends('layouts.master.master')

@section('title')
    Edit Profile
@endsection


@section('content')

<div class="row">

	<div class="col-md-12">

		@include('errors')

@if(isset($tours))
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title" style="float:left">All Tourist Areas</h4>
                <span class="btn btn-info" style="float:right" data-toggle="modal" data-target="#addTours">Add</span>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                                        <table class="table" id="tours" width="100%">
                                            <thead class=" text-primary">
                                                <th>
                                                    Title
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    City
                                                </th>
                                                <th>
                                                	Country
                                                </th>
                                                <th>
                                                	Image
                                                </th>
                                                <th>
                                                	Created At
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </thead>
                                            <tbody>

                                                @foreach($tours as $m)

                                                <tr>
                                                    <td>
                                                        {{$m->title}}
                                                    </td>
                                                    <td>
                                                        {{$m->description}}
                                                    </td>
                                                    <td>
                                                        {{$m->city}} 
                                                    </td>
                                                    <td>
                                                        {{$m->country}} 
                                                    </td>
                                                    <td>

                                                        <a href="{{asset('images/touristarea').'/'.$m->image}}" target="_blank">
                                                    	    {{ $m->image}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                    	{{ $m->created_at}}
                                                    </td>

                                                    <td>
                                                        <a href="/admin/deletetours/{{$m->id}}" class="btn btn-danger ">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>

                                    </div>
            </div>
        </div>
@endif
@if(isset($users))
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">All Users</h4>
            </div>
            <div class="card-body">
                
            <div class="table-responsive">
                                        <table class="table" id="users" width="100%">
                                            <thead class=" text-primary">
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    City
                                                </th>
                                                <th>
                                                	Country
                                                </th>
                                                <th>
                                                	Languages
                                                </th>
                                                <th>
                                                	Created At
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </thead>
                                            <tbody>

                                                @foreach($users as $m)
                                                <tr>
                                                    <td>
                                                        {{$m->name}}
                                                    </td>
                                                    <td>
                                                        {{$m->email}}
                                                    </td>
                                                    <td>
                                                        {{$m->role}}
                                                    </td>
                                                    <td>
                                                        {{$m->city}} 
                                                    </td>
                                                    <td>
                                                        {{$m->country}} 
                                                    </td>
                                                    <td>
                                                        {{$m->language}} 
                                                    </td>
                                                    <td>
                                                    	{{ $m->created_at}}
                                                    </td>
                                                    <td>
                                                        @if($m->role == 'guide')
                                                            <a href="#" data-toggle="modal" data-target="#m{{$m->id}}" class="btn btn-info ">
                                                                Detail
                                                            </a>
                                                        @endif
                                                        @if($m->role == 'user')
                                                            <a href="/admin/deleteuser/{{$m->id}}" class="btn btn-danger ">
                                                                Delete
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="m{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Full Detail of {{$m->name}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if(isset($m->guideProfile))
                                                                    <p><strong>Rate Per Day </strong>: {{$m->guideProfile->rate_per_day}}</p>
                                                                    <p><strong>Availability Status </strong>: @if($m->guideProfile->availability_status == 1) Available @else In Progress @endif </p>
                                                                    <p><strong>Certificate </strong>: </p> 
                                                                            <a href="{{asset('images/certificates').'/'.$m->guideProfile->certificate_image}}" target="_blank" >
                                                                                <img src="{{asset('images/certificates').'/'.$m->guideProfile->certificate_image}}" width="500px">
                                                                            </a>
                                                                           
                                                                    <p>  <br><strong>Skill and Experiences </strong>: </p>
                                                                    {!! html_entity_decode($m->guideProfile->skill_experience) !!}
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                                <a href="/admin/deleteuser/{{$m->id}}" class="btn btn-danger" >Delete</a>
                                                            </div>
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
@endif
@if(isset($bookings))
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">All Bookings</h4>
            </div>
            <div class="card-body">
                
            <div class="table-responsive">
                                        <table class="table" id="bookings" width="100%">
                                            <thead class=" text-primary">
                                                <th>
                                                    From
                                                </th>
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
                                            </thead>
                                            <tbody>

                                                @foreach($bookings as $m)

                                                <tr 
                                                    @if($m->status <0) style="text-decoration: line-through;" @endif
                                                    @if($m->status == 10) style="color: green;" @endif    
                                                >
                                                    <td>
                                                        {{$m->fromname}}
                                                    </td>
                                                    <td>
                                                        {{$m->toname}}
                                                    </td>
                                                    <td>
                                                        {{$m->tour_date}} {{$m->time}} - {{$m->days}} Days
                                                    </td>
                                                    <td>
                                                        {{$m->type_of_tour}} ({{$m->number_of_people}} Peoples)  
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
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>

                                    </div>
                    </div>
            </div>
        </div>
@endif
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addTours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tourist Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/admin/add/tour" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputCity">Title</label>
                    <input type="text" name="title" class="form-control" id="inputCity" placeholder = "Title" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">City </label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="City" name="city" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Country </label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Country" name="country" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="image"> Image <span  style="font-size:12px"> </span></label>
                <input id="image" type="file" class="form-control" name="image" required>
            </div>
            <br>
            <div class="form-group">
                <label for="inputAddress">Description</label>
                <textarea class="form-control ckeditor HTML" id="inputAddress" rows="5" name="description" placeholder="Write something for the guide." REQUIRED></textarea>
            </div>
            
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Tourist Area</button>
      </div>
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

<script>
$(document).ready(function() {
    $('#tours').DataTable({"pagingType": "full_numbers"});
    $('#users').DataTable({"pagingType": "full_numbers"});
    $('#bookings').DataTable({"pagingType": "full_numbers"});
} );

</script>
@endsection