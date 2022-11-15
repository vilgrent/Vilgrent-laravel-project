@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
<h1 style="margin-left:2%;color: #721c24;"><I>Shops</I></h1>
<br>
<a href="{{url('/').'/village/'.$getid}}" class="btn btn-success" style="margin-left:2%;">Back</a>
<br>
<br>
<br>
<div class="col-md-12">
<div class="row">
@foreach($getshopinfo as $key=>$value)
<div class="col-md-4" style="" >
<img src="/assets/images/{{$value->shop_photo}}"  class="img-thumbnail" style="height:50%;width:50%;margin-left:33px;border;border-color:brown;"><br>
<div class="details" style="margin-left:40px;font-size:25px;font-style:italic;color: #721c24;">
Shop Name: <span>{{$value->shop_name}}</span><br>
Shop Services: <span>{{$value->shop_services}}</span><br>
Phone Number: <span>{{$value->shop_phone_number}}</span><br>
Email: <span>{{$value->shop_email_id}}</span><br>
Timings: <span>{{$value->shop_timing}}</span><br>
Home delivery Available: <span>{{$value->shop_home_delivery_available}}</span><br>
Delivery Partners: <span>{{$value->shop_delivery_partners}}</span><br>
Address: <span>{{$value->shop_address}}</span> <br><br>
</div>
</div>

@endforeach
</div>
</div>



@endsection 