@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
<h1 style="margin-left:2%;color: #721c24;">Events</h1>
<br>
<a href="{{url('/').'/village/'.$getid}}" class="btn btn-success" style="margin-left:2%;">Back</a>
<br>
<br>
<br>
<div class="col-md-12">
<div class="row">
@foreach($geteventinfo as $key=>$value)

<div class="col-md-4" style="" >
<img src="/assets/images/{{$value->event_photo}}"  class="img-thumbnail" style="height:50%;width:50%;margin-left:33px;border;border-color:brown;"><br>
<div class="details" style="margin-left:40px;font-size:25px;font-style:italic;color:brown;">
Event Name: <span>{{$value->event_name}}</span><br>
Event Date: <span>{{$value->event_date}}</span><br>
Event Start Date: <span>{{$value->event_start_date}}</span><br>
Event End Date: <span>{{$value->event_end_date}}</span><br>
Address: <span>{{$value->address}}
</span>
<br>
<br>
</div>
</div>

@endforeach
</div>
</div>


@endsection 