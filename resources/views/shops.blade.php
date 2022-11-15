@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Add Shops Details</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('insert-shops')}}" enctype="multipart/form-data">
@csrf
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Shop Photo</label></B>
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
<B><label >Shop Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_name" class="form-control" placeholder="Enter shop_name"  >
<span class="text-danger">@error ('shop_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Shop Services</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_services" class="form-control" placeholder="Enter shop_services"  >
<span class="text-danger">@error ('shop_services') {{$message}} @enderror</span> 
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
<input type="number" name="shop_phone_number" class="form-control" placeholder="Enter shop_phone_number"  >
<span class="text-danger">@error ('shop_phone_number') {{$message}} @enderror</span> 
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
<input type="text" name="shop_email_id" class="form-control" placeholder="Enter shop_email_id"  >
<span class="text-danger">@error ('shop_email_id') {{$message}} @enderror</span> 
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
<input type="text" name="shop_address" class="form-control" placeholder="Enter shop_address"  >
<span class="text-danger">@error ('shop_address') {{$message}} @enderror</span> 
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
<select name="getvillagesid" id="getvillagesid" class="form-control input-md" value="{{old('getvillagesid')}}">
<option value="">-----Select village-----</option>
@foreach($getvillagesid as $key =>$value)
<option value="{{$value->id}}">{{$value->village_name}}</option>
 @endforeach
</select>
<span class="text-danger">@error ('getvillagesid') {{$message}} @enderror</span> 
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
<input type="text" name="shop_map_details" class="form-control" placeholder="Enter shop_map_details"  >
<span class="text-danger">@error ('shop_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Shop Timing</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="shop_timing" class="form-control" placeholder="Enter shop_timing"  >
<span class="text-danger">@error ('shop_timing') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6"> 
<B><lable >Home Delivery Available</lable></B>
</div>
<div class="col-md-6"  >
<div class="col-md-3">
<input type="radio" id="option1"  name="shop_home_delivery_available" class="form-group" value="Y" checked>
<label value="true" >Yes</label>
</div>
<div class=" col-md-3">
<input type="radio" id="option2" name="shop_home_delivery_available" class="form-group" value="N">
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
<input type="text" name="shop_delivery_partners" class="form-control" placeholder="Enter delivery_partners"  >
<span class="text-danger">@error ('shop_delivery_partners') {{$message}} @enderror</span> 
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
</form>
</div>
<table class="table table-striped" >
  <thead style="font-size:16px;">
      <tr>
      <th scope="col">Shop Photo</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Shop Services</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email Id</th>
      <th scope="col">Address</th>
      <th scope="col">Map details</th>
      <th scope="col">Shop Timing</th>
      <th scope="col">Home Delivery Available</th>
      <th scope="col">Delivery Partners</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getshopdetails as $key=>$value)
      <tr>
         
      <td><img src="/assets/images/{{$value->shop_photo}}" style="height:50px;width:50px;/"></td>
         <td>{{$value->shop_name}}</td>
         <td>{{$value->shop_services}}</td>
         <td>{{$value->shop_phone_number}}</td>
         <td>{{$value->shop_email_id}}</td>
         <td>{{$value->shop_address}}</td>
         <td>{{$value->shop_map_details}}</td>
         <td>{{$value->shop_timing}}</td>
         <td>{{$value->shop_home_delivery_available}}</td>
         <td>{{$value->shop_delivery_partners}}</td>
         <td><a href="{{url('editshop')}}/{{$value->shop_id}}" class="btn btn-success">Edit</a></td>
         <td><a href="{{url('deleteshop')}}/{{$value->shop_id}}" class="btn btn-danger">Delete</a></td>
         </tr>
    </tbody>
@endforeach
  </table>
</div>
</div>
</div>

@endsection