@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Update important places to Visit</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form method="post" action="{{url('update-impplace')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$editimpplaces->id}}">
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label>Imp_place_Photo</label></B>
<br>
</div>
<div class="col-md-6">
<a href="<?php if(isset($editimpplaces) && $editimpplaces->imp_place_photo){echo url('/').'/assets/images/'.$editimpplaces->imp_place_photo; } ?>" target="blank"> <img src="<?php if(isset($editimpplaces) && $editimpplaces->imp_place_photo){echo url('/').'/assets/images/'.$editimpplaces->imp_place_photo; } ?>" style=" height:200px;width: 200px; margin-top:-0px;margin-left:%;"></a>
<input type="file" name="file" class="form-control"   >
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>

<div class="row">
<div class="col-md-6">
<B><label >Imp_Place_Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_name" class="form-control" placeholder="Enter imp_place_name"  value="<?php if(isset($editimpplaces) && $editimpplaces->imp_place_name){ echo $editimpplaces->imp_place_name; }?>"  >
<span class="text-danger">@error ('imp_place_name') {{$message}} @enderror</span> 
<br>
</div>
</div>

<div class="row">
<div class="col-md-6">
<B><label>Imp_place_Details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_details" class="form-control" placeholder="Enter imp_place_details"  value="<?php if(isset($editimpplaces) && $editimpplaces->imp_place_details){ echo $editimpplaces->imp_place_details; }?>"  >
<span class="text-danger">@error ('imp_place_details') {{$message}} @enderror</span> 
<br>
</div>
</div>

<div class="row">
<div class="col-md-6">
<B><label>Imp_place_map_details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_map_details" class="form-control" placeholder="Enter imp_place_map_details" value="<?php if(isset($editimpplaces) && $editimpplaces->imp_place_map_details){ echo $editimpplaces->imp_place_map_details; }?>"  >
<span class="text-danger">@error ('imp_place_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<div class="row">
<div class="col-md-6">
<B><label>Imp_place_Address</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_address" class="form-control" placeholder="Enter imp_place_address" value="<?php if(isset($editimpplaces) && $editimpplaces->imp_place_address){ echo $editimpplaces->imp_place_address; }?>"  >
<span class="text-danger">@error ('imp_place_address') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<!-- <input type="hidden" name="village_id" id="village_id" value="{{$getid}}" >
 -->
 <div class="row">
<button type="submit" class="btn btn-success" style="margin-left:40%;">Update</button>&nbsp;
<a href="{{url('imp_places')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
</div>
@endsection()