@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
<h1 style="margin-left:2%;color: #721c24;"><I>Important Places to Visit</I></h1>
<br>
<a href="{{url('/').'/village/'.$getid}}" class="btn btn-success" style="margin-left:2%;">Back</a>
<br>
<br>
<br>
<div class="col-md-12">
<div class="row">
@foreach($getimpplace as $key=>$value)

<div class="col-md-4" style="" >
<img src="/assets/images/{{$value->imp_place_photo}}"  class="img-thumbnail" style="height:50%;width:50%;margin-left:33px;border;border-color:#721c24;"><br>
<div class="details" style="margin-left:40px;font-size:25px;font-style:italic;color:#721c24;">
Name: <span>{{$value->imp_place_name}}</span><br>
Details: <span>{{$value->imp_place_details}}</span><br>
Address: <span>{{$value->imp_place_address}}</span><br> 
</div>
</div>

@endforeach
</div>
</div>

@endsection 