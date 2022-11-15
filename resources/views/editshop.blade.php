@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Update Shops Details</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('update-shop')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="shop_id" value="{{$editshops->shop_id}}">
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<b><label >Shop Photo</label></b>
<br>
</div>
<div class="col-md-6">
<a href="<?php if(isset($editshops) && $editshops->shop_photo){echo url('/').'/assets/images/'.$editshops->shop_photo; } ?>" target="blank"> <img src="<?php if(isset($editshops) && $editshops->shop_photo){echo url('/').'/assets/images/'.$editshops->shop_photo; } ?>" style=" height:200px;width: 200px; margin-top:-0px;margin-left:%;"></a>
<input type="file" name="file" class="form-control"   >
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >Shop Name</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_name" class="form-control" placeholder="Enter shop_name" value="<?php if(isset($editshops) && $editshops->shop_name){ echo $editshops->shop_name; }?>" required>
<span class="text-danger">@error ('shop_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label>Shop Services</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_services" class="form-control" placeholder="Enter shop_services" value="<?php if(isset($editshops) && $editshops->shop_services){ echo $editshops->shop_services; }?>" required>
<span class="text-danger">@error ('shop_services') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label>Phone Number</label></b>
<br>
</div>
<div class="col-md-6">
<input type="number" name="shop_phone_number" class="form-control" placeholder="Enter shop_phone_number"  value="<?php if(isset($editshops) && $editshops->shop_phone_number){ echo $editshops->shop_phone_number; }?>"  >
<span class="text-danger">@error ('shop_phone_number') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >Email Id</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_email_id" class="form-control" placeholder="Enter shop_email_id" value="<?php if(isset($editshops) && $editshops->shop_email_id){ echo $editshops->shop_email_id; }?>"  >
<span class="text-danger">@error ('shop_email_id') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >Address</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_address" class="form-control" placeholder="Enter shop_address" value="<?php if(isset($editshops) && $editshops->shop_address){ echo $editshops->shop_address; }?>" required>
<span class="text-danger">@error ('shop_address') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label>Map Details</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_map_details" class="form-control" placeholder="Enter shop_map_details" value="<?php if(isset($editshops) && $editshops->shop_map_details){ echo $editshops->shop_map_details; }?>"  >
<span class="text-danger">@error ('shop_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label>Shop Timing</label></b>
<br>
</div>
<div class="col-md-6">
<input type="time" name="shop_timing" class="form-control" placeholder="Enter shop_timing" value="<?php if(isset($editshops) && $editshops->shop_timing){ echo $editshops->shop_timing; }?>" required  >
<span class="text-danger">@error ('shop_timing') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6"> 
<b><lable >Home Delivery Available</lable></b>
</div>
<div class="col-md-6"  >
<div class="col-md-3">
<input type="radio" id="option1"  name="shop_home_delivery_available" class="form-group" value="Y" {{ ($editshops->shop_home_delivery_available=="Y")? "checked" : "" }} required>
<label value="true" >Yes</label>
</div>
<div class=" col-md-3">
<input type="radio" id="option2" name="shop_home_delivery_available" class="form-group" value="N" {{ ($editshops->shop_home_delivery_available=="N")? "checked" : "" }} required>
<label value="flase">No</label>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label>Delivery Partners</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_delivery_partners" class="form-control" placeholder="Enter delivery_partners" value="<?php if(isset($editshops) && $editshops->shop_delivery_partners){ echo $editshops->shop_delivery_partners; }?>"  >
<span class="text-danger">@error ('shop_delivery_partners') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<!-- <input type="hidden" name="village_id" id="village_id" value="{{$getid}}" >
 -->
 <div class="row">
<button type="submit" class="btn btn-success" style="margin-left:40%;">Update</button>&nbsp;
<a href="{{url('shops')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</form>
</div>
</div>
@endsection