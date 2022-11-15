@extends('layouts.App')
@section('main-content1')
<center>
<div class="card bg-light " style="max-width:50%;height:200%;">
<B><div class="card-header">Update Village</div></B>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
 @endif
<form  action="{{url('update-village')}}" enctype="multipart/form-data" method="post" >
   @csrf
   <input type="hidden" name="id" value="{{$editvillage->id}}">

<div class="col-md-12">
<div class="row">
<div class="col-md-6">
<b><label style="margin-left:-100px;">Village Photo</label></b>
<br>
</div>
<div class="col-md-6">
<a href="<?php if(isset($editvillage) && $editvillage->village_image){echo url('/').'/assets/images/'.$editvillage->village_image; } ?>" target="blank"> <img src="<?php if(isset($editvillage) && $editvillage->village_image){echo url('/').'/assets/images/'.$editvillage->village_image; } ?>" style=" height:200px;width: 200px; margin-top:-0px;margin-left:-50%;"></a>
<input type="file" name="file" class="form-control">
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b><label style="margin-left:-100px;">Village Name</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="village_name" class="form-control" placeholder="Enter Village Name" id="name"value="<?php if(isset($editvillage) && $editvillage->village_name){ echo $editvillage->village_name; }?>">
<span class="text-danger">@error ('village_name') {{$message}} @enderror</span> 
<br>

</div>
</div>
<div class="row">
<div class="col-md-6">
<b><label style="margin-left:-100px;">District</label></b>
</div>
<div class="col-md-6">
<input type="text" name="district" class="form-control" placeholder="Enter District" value="<?php if(isset($editvillage) && $editvillage->district){ echo $editvillage->district; }?>">
<span class="text-danger">@error ('district') {{$message}} @enderror</span> 
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label style="margin-left:-100px;">address</label></b>
</div>
<div class="col-md-6">
<input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php if(isset($editvillage) && $editvillage->address){ echo $editvillage->address; }?>">
 
<span class="text-danger">@error ('address') {{$message}} @enderror</span> 
<br>

</div>
</div>
<div class="row">
<div class="col-md-6">
<b><label style="margin-left:-100px;">Map_details</label></b>
</div>
<div class="col-md-6">
<input type="text" name="map_details" class="form-control" placeholder="Enter Map_details" value="<?php if(isset($editvillage) && $editvillage->map_details){ echo $editvillage->map_details; }?>" >
<span class="text-danger">@error ('map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>

<div class="row">
<div class="col-md-6">
<b><label style="margin-left:-100px;">PinCode</label></b>
</div>
<div class="col-md-6">
<input type="text" name="village_pin_code" class="form-control" placeholder="Enter PinCode" value="<?php if(isset($editvillage) && $editvillage->village_pin_code){ echo $editvillage->village_pin_code; }?>">
<span class="text-danger">@error ('village_pin_code') {{$message}} @enderror</span> 
<br>
<br>
</div>
</div>
<div class="row">
<div class="col-md-6"> 
<b><lable style="margin-left:-100px;">Rural_id</lable></b>
</div>
<div class="col-md-6" style="margin-left:-180px;" >
<div class="col-md-3">
<input type="radio" id="option1"  name="rural_id" class="form-group" value="Y" {{($editvillage->rural_id=="Y")? "checked" : "" }} >
<label value="true" >Yes</label>
</div>
<div class=" col-md-3">
<input type="radio" id="option1" name="rural_id" class="form-group" value="N" {{($editvillage->rural_id=="N")? "checked" : "" }}>
<label value="flase">No</label>
</div>
</div>
</div>
</div>
<br>
</div>
<div class="col-md-12">
<button type="submit" class="btn btn-success">Update</button>&nbsp;
<a href="{{url('newvillage')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
</div>
</center>
@endsection