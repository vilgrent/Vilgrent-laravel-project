@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Update Hotels Details</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('update-hotel')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="hotel_id" value="{{$edithotel->hotel_id}}">
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Hotel Photo</label></B>
<br>
</div>
<div class="col-md-6">
<a href="<?php if(isset($edithotel) && $edithotel->hotel_photo){echo url('/').'/assets/images/'.$edithotel->hotel_photo; } ?>" target="blank"> <img src="<?php if(isset($edithotel) && $edithotel->hotel_photo){echo url('/').'/assets/images/'.$edithotel->hotel_photo; } ?>" style=" height:200px;width: 200px; margin-top:-0px;margin-left:%;"></a>
<input type="file" name="file" class="form-control" >
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Hotel Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="hotel_name" class="form-control" placeholder="Enter hotel_name"   value="<?php if(isset($edithotel) && $edithotel->hotel_name){ echo $edithotel->hotel_name; }?>" >
<span class="text-danger">@error ('hotel_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Hotel Services</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="hotel_services" class="form-control" placeholder="Enter hotel_services" value="<?php if(isset($edithotel) && $edithotel->hotel_services){ echo $edithotel->hotel_services; }?>" > 
<span class="text-danger">@error ('hotel_services') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Phone Number</label></B>
<br>
</div>
<div class="col-md-6">
<input type="number" name="hotel_phone_number" class="form-control" placeholder="Enter hotel_phone_number"  value="<?php if(isset($edithotel) && $edithotel->hotel_phone_number){ echo $edithotel->hotel_phone_number; }?>" > 
<span class="text-danger">@error ('hotel_phone_number') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Email Id</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name=" hotel_email_id" class="form-control" placeholder="Enter hotel_email_id" value="<?php if(isset($edithotel) && $edithotel->hotel_email_id){ echo $edithotel->hotel_email_id; }?>" >
<span class="text-danger">@error (' hotel_email_id') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Address</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="hotel_address" class="form-control" placeholder="Enter hotel_address" value="<?php if(isset($edithotel) && $edithotel->hotel_address){ echo $edithotel->hotel_address; }?>"   >
<span class="text-danger">@error ('hotel_address') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Map Details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="hotel_map_details" class="form-control" placeholder="Enter hotel_map_details"  value="<?php if(isset($edithotel) && $edithotel->hotel_map_details){ echo $edithotel->hotel_map_details; }?>"  >
<span class="text-danger">@error ('hotel_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Hotel Timing</label></B>
<br>
</div>
<div class="col-md-6">
<input type="time" name="hotel_timing" class="form-control" placeholder="Enter hotel_timing"  value="<?php if(isset($edithotel) && $edithotel->hotel_timing){ echo $edithotel->hotel_timing; }?>">
<span class="text-danger">@error ('hotel_timing') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6"> 
<B><lable >Hotel Home_Delivery Available</lable></B>
</div>
<div class="col-md-6"  >
<div class="col-md-3">
<input type="radio" id="option1"  name="hotel_home_delivery_available" class="form-group" value="Y" {{ ($edithotel->hotel_home_delivery_available=="Y")? "checked" : "" }}>
<label value="true" >Yes</label>
</div>
<div class=" col-md-3">
<input type="radio" id="option2" name="hotel_home_delivery_available" class="form-group" value="N" {{ ($edithotel->hotel_home_delivery_available=="N")? "checked" : "" }}>
<label value="flase">No</label>
</div>
</div>
</div>
<br>
<div class="row">                                                                                                         
<div class="col-md-6">
<B><label>Delivery Partners</B>                                                                                                                   el></B>
<br>                                
</div>
<div class="col-md-6">
<input type="text" name="hotel_delivery_partners" class="form-control" placeholder="Enter hotel_delivery_partners"  value="<?php if(isset($edithotel) && $edithotel->hotel_delivery_partners){ echo $edithotel->hotel_delivery_partners; }?>">
<span class="text-danger">@error ('hotel_delivery_partners') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<button type="submit" class="btn btn-success" style="margin-left:40%;"                                                                      >Update</button>&nbsp;
<a href="{{url('hotels')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
</div>
@endsection()