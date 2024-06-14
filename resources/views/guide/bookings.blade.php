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
                                                    From
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
                                            @if($activebooking)
                                                <tr>
                                                    <td>
                                                        {{$activebooking->fromname}}
                                                    </td>
                                                    <td>
                                                        {{$activebooking->tour_date}} {{$activebooking->time}} - {{$activebooking->days}} Days
                                                    </td>
                                                    <td>
                                                        {{$activebooking->type_of_tour}} ({{$activebooking->number_of_people}} Peoples)  
                                                    </td>
                                                    <td>
                                                            <b> In Progress </b>
                                                    </td>
                                                    <td>
                                                        <a href="{{asset('images/booking').'/'.$activebooking->evidence}}" target="_blank">
                                                    	    {{ $activebooking->evidence}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                    	{{ $activebooking->created_at}}
                                                    </td>
                                                    <td>
                                                            <a href="/guide/mark-as-complete/{{$activebooking->id}}" class="btn btn-info ">
                                                                Complete
                                                            </a>
                                                    </td>
                                                    
                                                </tr>
                                            @endif

                                                @foreach($bookings as $m)

                                                <tr 
                                                    @if($m->status <0) style="text-decoration: line-through;" @endif
                                                    @if($m->status == 10) style="color: green;" @endif    
                                                >
                                                    <td>
                                                        {{$m->fromname}}
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

@endsection
