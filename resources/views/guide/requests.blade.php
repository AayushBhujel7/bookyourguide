@extends('layouts.master.master')

@section('title')
    User
@endsection

@section('content')
@include('errors')
<div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">All Requests</h4>
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

                                                @foreach($requests as $m)

                                                <tr>
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
                                                        <a href="{{asset('images/booking').'/'.$m->evidence}}" target="_blank">
                                                    	    {{ $m->evidence}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                    	{{ $m->created_at}}
                                                    </td>
                                                    <td>
                                                        @if($m->status == 0)
                                                            <a href="/guide/selectRequest/{{$m->id}}/select" class="btn btn-info ">
                                                                Select
                                                            </a>
                                                        @else
                                                            <a href="#" class="btn btn-success ">
                                                                In Progress
                                                            </a>
                                                        @endif
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
