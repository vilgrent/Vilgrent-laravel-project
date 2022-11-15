@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Add Contact List</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('insertcontactlist')}}" enctype="multipart/form-data">
@csrf
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Contact Photo</label></B>
<br>
</div>
<div class="col-md-6">
<img src=""style="height:50px;width:50px;">
<input type="file" name="file" class="form-control"   >
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Contact Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="contact_name" class="form-control" placeholder="Enter contact_name">
<span class="text-danger">@error ('contact_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Contact Designation</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="contact_designation" class="form-control" placeholder="Enter contact_designation">
<span class="text-danger">@error ('contact_designation') {{$message}} @enderror</span> 
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
<input type="number" name="contact_phone_number" class="form-control" placeholder="Enter contact_phone_number">
<span class="text-danger">@error ('contact_phone_number') {{$message}} @enderror</span> 
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
<input type="text" name="contact_email_id" class="form-control" placeholder="Enter contact_email_id">
<span class="text-danger">@error ('contact_email_id') {{$message}} @enderror</span> 
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
<input type="text" name="contact_address" class="form-control" placeholder="Enter contact_address">
<span class="text-danger">@error ('contact_address') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Villages</label></B>
<br>
</div>
<div class="col-md-6">
<select name="getvillageids" id="getvillageids" class="form-control input-md" value="{{old('getvillageids')}}">
<option value="">-----Select village-----</option>
@foreach($getvillageids as $key =>$value)
<option value="{{$value->id}}">{{$value->village_name}}</option>
 @endforeach
</select>
<span class="text-danger">@error ('getvillageids') {{$message}} @enderror</span> 
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
<input type="text" name="contact_map_details" class="form-control" placeholder="Enter contact_map_details">
<span class="text-danger">@error ('contact_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Contact Works</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="contact_works" class="form-control" placeholder="Enter contact_works"  >
<span class="text-danger">@error ('contact_works') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<!-- <input type="hidden" name="village_id" id="village_id" value="{{$getid}}" >
 -->
 <div class="row">
<button type="submit" class="btn btn-primary" style="margin-left:40%;">Save</button>&nbsp;
<a href="{{url('contactlist')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
<table class="table table-striped" >
  <thead style="font-size:16px;">
      <tr>
      <th scope="col">Contact Photo</th>
      <th scope="col">Contact Name</th>
      <th scope="col">Contact Designation</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email Id</th>
      <th scope="col">Address</th>
      <th scope="col">Map_details</th>
      <th scope="col">Contact Works</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
      @foreach($getcontactlist as $key=>$value)
      <tr>
         
      <td><img src="/assets/images/{{$value->contact_photo}}" style="height:50px;width:50px;/"></td>
         <td>{{$value->contact_name}}</td>
         <td>{{$value->contact_designation}}</td>
         <td>{{$value->	contact_phone_number}}</td>
         <td>{{$value->contact_email_id}}</td>
         <td>{{$value->contact_address}}</td>
         <td>{{$value->contact_map_details}}</td>
         <td>{{$value->contact_works}}</td>
         <td><a href="{{url('editcontactlist')}}/{{$value->contact_id}}" class="btn btn-success">Edit</a></td>
         <td><a href="{{url('deletecontact')}}/{{$value->contact_id}}" class="btn btn-danger">Delete</a></td>
         </tr>
    </tbody>
@endforeach
  </table>
</div>
</div>
</div>

@endsection()