@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
<h1 style="margin-left:2%;color: #721c24;"><I>Places to Visit</I></h1>
<br>
<a href="{{url('/').'/village/'.$getid}}" class="btn btn-success" style="margin-left:2%;">Back</a>
<br>
<br>
<br>

<div class="col-md-12">
<div class="row">
@foreach($getplacesinfo as $key=>$value)
<div class="col-md-4" style="" >
<img src="/assets/images/{{$value->place_photo}}"  class="img-thumbnail" style="height:50%;width:50%;margin-left:33px;border;border-color:brown;"><br>
<div class="details" style="margin-left:40px;font-size:25px;font-style:italic;">
Place Name: <span>{{$value->place_name}}</span><br>
Place Details: <span>{{$value->place_details}}</span><br>
Address: <span>{{$value->place_address}}</span>
</div>
</div>

@endforeach
</div>
</div>


</div>


@endsection 