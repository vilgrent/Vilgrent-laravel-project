@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Add Place to Visit</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('insert-place')}}" enctype="multipart/form-data">
@csrf
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Place Image</label></B>
<br>
</div>
<div class="col-md-6">
<img src=""style="height:50px;width:50px;">
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
<input type="text" name="place_name" class="form-control" placeholder="Enter place_Name">
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
<input type="text" name="place_details" class="form-control" placeholder="Enter place details">
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
<input type="text" name="place_map_details" class="form-control" placeholder="Enter Place_map_details" >
<span class="text-danger">@error ('place_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Village</label></B>
<br>
</div>
<div class="col-md-6">
<select name="villages" id="villages" class="form-control input-md" value="{{old('villages')}}">
<option value="">-----Select village-----</option>
@foreach($villages as $key =>$value)
<option value="{{$value->id}}">{{$value->village_name}}</option>
 @endforeach
</select>
<span class="text-danger">@error ('villages') {{$message}} @enderror</span> 
</div>
</div>
<br>
<br>
<div class="row">
<div class="col-md-6">
<B><label >place Address</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="place_address" class="form-control" placeholder="Enter place_address">
<span class="text-danger">@error ('place_address') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<button type="submit" class="btn btn-primary" style="margin-left:40%;">Save</button>&nbsp;
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
      <th scope="col">Place Photo</th>
      <th scope="col">Place Name</th>
      <th scope="col">place Details</th>
      <th scope="col">Map Details</th>
      <th scope="col">Place Address</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getplacetovisit as $key=>$value)
      <tr>
         
         <td><?php
     $image='';
     if(isset($value->place_photo) && $value->place_photo != "") 
      {
        $image=url('/').'/assets/images/'.$value->place_photo;
      }
      else{
        $image='';
      }
      ?>
  
<a href="{{$image}}" target="blank"> 
   <img src="{{$image}}" style="height:50px;width:50px;/"></a></td>
         <td>{{$value->place_name}}</td>
         <td>{{$value->place_details}}</td>
         <td>{{$value->place_map_details}}</td>
         <td>{{$value->place_address}}</td>
         <td><a href="{{url('editplaces')}}/{{$value->id}}" class="btn btn-success">Edit</a></td>
         <td><a href="{{url('delete')}}/{{$value->id}}" class="btn btn-danger">Delete</a></td>
         </tr>
    </tbody>
    @endforeach

  </table>
</div>
</div>
</div>
@endsection()