@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Add Hotels Details</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('insert-hotel')}}" enctype="multipart/form-data">
@csrf
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Hotel Photo</label></B>
<br>
</div>
<div class="col-md-6">
<input type="file" name="file" class="form-control"   >
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
<input type="text" name="hotel_name" class="form-control" placeholder="Enter hotel_name"  >
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
<input type="text" name="hotel_services" class="form-control" placeholder="Enter hotel_services"  >
<span class="text-danger">@error ('hotel_services') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Phone Number</label></B>
<br>
</div>
<div class="col-md-6">
<input type="number" name="hotel_phone_number" class="form-control" placeholder="Enter hotel_phone_number"  >
<span class="text-danger">@error ('hotel_phone_number') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Email Id</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="hotel_email_id" class="form-control" placeholder="Enter hotel_email_id"  >
<span class="text-danger">@error ('hotel_email_id') {{$message}} @enderror</span> 
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
<input type="text" name="hotel_address" class="form-control" placeholder="Enter hotel_address"  >
<span class="text-danger">@error ('hotel_address') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Villages</label></B>
<br>
</div>
<div class="col-md-6">
<select name="getvillagesids" id="getvillagesids" class="form-control input-md" value="{{old('getvillagesids')}}">
<option value="">-----Select village-----</option>
@foreach($getvillagesids as $key =>$value)
<option value="{{$value->id}}">{{$value->village_name}}</option>
 @endforeach
</select>
<span class="text-danger">@error ('getvillagesids') {{$message}} @enderror</span> 
</div>
</div>
<br>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Map Details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="hotel_map_details" class="form-control" placeholder="Enter hotel_map_details"  >
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
<input type="text" name="hotel_timing" class="form-control" placeholder="Enter hotel_timing"  >
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
<input type="radio" id="option1"  name="hotel_home_delivery_available" class="form-group" value="Y" checked>
<label value="true" >Yes</label>
</div>
<div class=" col-md-3">
<input type="radio" id="option2" name="hotel_home_delivery_available" class="form-group" value="N">
<label value="flase">No</label>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Delivery Partners</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="hotel_delivery_partners" class="form-control" placeholder="Enter hotel_delivery_partners"  >
<span class="text-danger">@error ('hotel_delivery_partners') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<!-- <input type="hidden" name="village_id" id="village_id" value="{{$getid}}" >
 -->
 <div class="row">
<button type="submit" class="btn btn-primary" style="margin-left:40%;">Save</button>&nbsp;
<a href="{{url('adminhomes')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
<div class="container">
<table class="table table-striped" >
  <thead style="font-size:16px;">
      <tr>
      <th scope="col">Hotel Photo</th>
      <th scope="col">Hotel Name</th>
      <th scope="col">Hotel Services</th>
      <th scope="col">HotelPhone Number</th>
      <th scope="col">Hotel Email Id</th>
      <th scope="col">Hotel Address</th>
      <th scope="col">Map_details</th>
      <th scope="col">Hotel Timing</th>
      <th scope="col">Hotel Home_Delivery Available</th>
      <th scope="col">Delivery Partners</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th></th>
      <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($gethoteldetails as $key=>$value)
    <tr>
         
         <td><img src="/assets/images/{{$value->hotel_photo}}" style="height:50px;width:50px;/"></td>
         <td>{{$value->hotel_name}}</td>
         <td>{{$value->hotel_services}}</td>
         <td>{{$value->hotel_phone_number}}</td>
         <td>{{$value->hotel_email_id}}</td>
         <td>{{$value->hotel_address}}</td>
         <td>{{$value->hotel_map_details}}
         <td>{{$value->hotel_timing}}
         <td>{{$value->hotel_home_delivery_available}}
         <td>{{$value->hotel_delivery_partners}}
         <td><a href="{{url('edithotels')}}/{{$value->hotel_id}}" class="btn btn-success">Edit</a></td>
         <td><a href="{{url('deletehotel')}}/{{$value->hotel_id}}" class="btn btn-danger">Delete</a></td>
         </tr>
    </tbody>
    @endforeach

  </table>
</div>
</div>
</div>

@endsection()