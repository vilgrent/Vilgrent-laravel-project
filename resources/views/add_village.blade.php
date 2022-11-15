@extends('layouts.App')
@section('main-content1')

<div class="container" >
  <?php $getid = request()->segment(count(request()->segments()));?>
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
 @endif
<form method="post" action="{{url('insertVillage')}}" enctype="multipart/form-data" id="addvillage">
@csrf
<b><div class="card-header" style="font-size: large;text-align: center;">Add Villages</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">


<div class="col-md-12">
   <div class="row">
<div class="col-md-6">
<B><label>Village Photo</label></B>
<br>
</div>
<div class="col-md-6">
<img src=""style="height:50px;width:50px;">
<input type="file" name="file" class="form-control"   >
<span class="text-danger">@error ('image') {{$message}} @enderror</span> 
<br>
</div>
</div>

<div class="row">
<div class="col-md-6">
<B><label >Village Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="village_name" class="form-control" placeholder="Enter Name" id="name"  >
<span class="text-danger">@error ('village_name') {{$message}} @enderror</span> 
<br>

</div>
</div>
<div class="row">
<div class="col-md-6">
<B><label >District</label></B>
</div>
<div class="col-md-6">
<input type="text" name="district" class="form-control" placeholder="Enter District" >
<span class="text-danger">@error ('district') {{$message}} @enderror</span> 
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>address</label></B>
</div>
<div class="col-md-6">
<input type="text" name="address" class="form-control" placeholder="Enter Address"  >
<span class="text-danger">@error ('address') {{$message}} @enderror</span> 

</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Map_details</label></B>
</div>
<div class="col-md-6">
<input type="text" name="map_details" class="form-control" placeholder="Enter map_details" >
<span class="text-danger">@error ('map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>

<div class="row">
<div class="col-md-6">
<B><label >PinCode</label></B>
</div>
<div class="col-md-6">
<input type="text" name="village_pin_code" class="form-control" placeholder="Enter PinCode"  >
<span class="text-danger">@error ('village_pin_code') {{$message}} @enderror</span> 
<br>
<br>
</div>
</div>
<div class="row">
<div class="col-md-6"> 
<B><lable >Rural_id</lable></B>
</div>
<div class="col-md-6">
<div class="col-md-3">
<input type="radio" id="option1"  name="rural_id" class="form-group" value="Y" checked >
<label value="true" >Yes</label>
</div>
<div class=" col-md-3">
<input type="radio" id="option1" name="rural_id" class="form-group" value="N" >
<label value="flase">No</label>
</div>
</div>

<br>

<input type="hidden" name="village_id" id="village_id" value="{{$getid}}">
<button type="submit" class="btn btn-primary" style="margin-left:40%;">Save</button> &nbsp;
<a href="{{url('adminhomes')}}" class="btn btn-danger">Back</a>
</div>
</div>
</form>
</div>
</div>
<div class="container">
<table class="table table-striped" >
  <thead style="font-size:16px;">
      <tr>
      <th scope="col">Village_Photo</th>
      <th scope="col">Village Name</th>
      <th scope="col">District</th>
      <th scope="col">Address</th>
      <th scope="col">Rural_id</th>
      <th scope="col">Map_details</th>
      <th scope="col">Pin code</th>
      <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getvillagedetails as $key=>$value)
      <tr>
      <td><img src="/assets/images/{{$value->village_image}}" style="height:50px;width:50px;/"></td>
         <td>{{$value->village_name}}</td>
         <td>{{$value->district}}</td>
         <td>{{$value->address}}</td>
         <td>{{$value->rural_id}}</td>
         <td>{{$value->map_details}}</td>
         <td>{{$value->village_pin_code}}</td>
         <td><a href="{{url('editpage')}}/{{$value->id}}" class="btn btn-success">Edit</a></td>
        </tr>
    </tbody>
    @endforeach
  </table>
</div>
</div>

@endsection

