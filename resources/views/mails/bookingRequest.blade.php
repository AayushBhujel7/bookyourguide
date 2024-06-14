Hello <b>{{$data['guide']->name}}</b>,
<br>
<p>
    You have received a booking request with the following details. Please goto your profile to respond to it.
</p>
<table border="1px" cellpadding="10px">
    <tr>
        <td> Name </td>
        <td> {{$data['user']->name}}
    </tr>
    <tr>
        <td> Email </td>
        <td> {{$data['user']->email}}
    </tr>
    <tr>
        <td> Tour Date </td>
        <td> {{$data['booking']->tour_date}}
    </tr>
    <tr>
        <td> Tour Time </td>
        <td> {{$data['booking']->time}}
    </tr>
    <tr>
        <td> Number of days </td>
        <td> {{$data['booking']->days}}
    </tr>
    <tr>
        <td> Type of Tour </td>
        <td> {{$data['booking']->type_of_tour}}
    </tr>
    <tr>
        <td> Comments </td>
        <td> {{$data['booking']->description}}
    </tr>
    @if(isset($data['booking']->evidence))
        <tr>
            <td> Evidence </td>{{asset('images/booking').'/'.$data['booking']->evidence}}
            <td> {{asset('images/booking').'/'.$data['booking']->evidence}}</td>
        </tr>
    @endif
    <tr>
        <td> Requested Date </td>
        <td> {{$data['booking']->created_at}}
    </tr>
</table>

    Thank you.

<hr>
<p>
    <b> Guide Booking System</p>
</p>