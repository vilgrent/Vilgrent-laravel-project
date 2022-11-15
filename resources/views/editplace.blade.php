@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Update Place to Visit</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('update-place')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$geteditplace->id}}">
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Place Image</label></B>
<br>
</div>
<div class="col-md-6">
<a href="<?php if(isset($geteditplace) && $geteditplace->place_photo){echo url('/').'/assets/images/'.$geteditplace->place_photo; } ?>" target="blank"> <img src="<?php if(isset($geteditplace) && $geteditplace->place_photo){echo url('/').'/assets/images/'.$geteditplace->place_photo; } ?>" style=" height:200px;width: 200px; margin-top:-4%;margin-left:%;"></a>
<input type="file" name="file" class="form-control">
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Place Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="place_name" class="form-control" placeholder="Enter place_Name" value="<?php if(isset($geteditplace) && $geteditplace->place_name){ echo $geteditplace->place_name; }?>" >
<span class="text-danger">@error ('place_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >place_details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="place_details" class="form-control" placeholder="Enter place details"  value="<?php if(isset($geteditplace) && $geteditplace->place_details){ echo $geteditplace->place_details; }?>"  >
<span class="text-danger">@error ('place_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Place_map_details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="place_map_details" class="form-control" placeholder="Enter Place_map_details" value="<?php if(isset($geteditplace) && $geteditplace->place_map_details){ echo $geteditplace->place_map_details; }?>"  >
<span class="text-danger">@error ('place_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >place Address</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="place_address" class="form-control" placeholder="Enter place_address" value="<?php if(isset($geteditplace) && $geteditplace->place_address){ echo $geteditplace->place_address; }?>"  >
<span class="text-danger">@error ('place_address') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
 <div class="row">
<button type="submit" class="btn btn-success" style="margin-left:40%;">Update</button>&nbsp;
<a href="{{url('placetoVisit')}}" class="btn btn-danger">Back</a>
</div>
</div>
</form>
</div>
</div>
</div>
@endsection()