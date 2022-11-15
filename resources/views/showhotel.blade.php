@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
<h1 style="margin-left:2%;color: #721c24;"><I>Hotels</I></h1>
<br>
<a href="{{url('/').'/village/'.$getid}}" class="btn btn-success" style="margin-left:2%;">Back</a>
<br>
<br>
<br>
<div class="col-md-12">
<div class="row">
@foreach($gethotellist as $key=>$value)

<div class="col-md-4" style="" >
<img src="/assets/images/{{$value->hotel_photo}}"  class="img-thumbnail" style="height:50%;width:50%;margin-left:33px;"><br>
<div class="details" style="margin-left:40px;font-size:25px;font-style:italic;">
Hotel Name: <span>{{$value->hotel_name}}</span><br>
Hotel Services: <span>{{$value->hotel_services}}</span><br>
Phone Number: <span>{{$value->hotel_phone_number}}</span><br>
Email: <span>{{$value->hotel_email_id}}</span><br>
Timings: <span>{{$value->hotel_timing}}</span><br>
Home Delivery Available: <span>{{$value->hotel_home_delivery_available}}</span><br>
Delivery Partners:<span>{{$value->hotel_home_delivery_available}}</span><br>
Address: <span>{{$value->hotel_address}}</span><br> 

</div>
</div>

@endforeach
</div>
</div>

@endsection 