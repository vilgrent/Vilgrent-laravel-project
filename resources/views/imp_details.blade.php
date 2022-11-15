@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<b><div class="card-header" style="font-size: large;text-align: center;">Add important places to Visit</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form method="post" action="{{url('insert-impplace')}}" enctype="multipart/form-data">
@csrf
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label>Imp_place_photo</label></B>
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
<B><label >Imp_place_Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_name" class="form-control" placeholder="Enter imp_place_name"  >
<span class="text-danger">@error ('imp_place_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Imp_place_Details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_details" class="form-control" placeholder="Enter imp_place_details"  >
<span class="text-danger">@error ('imp_place_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label>Imp_place_map_details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_map_details" class="form-control" placeholder="Enter imp_place_map_details"  >
<span class="text-danger">@error ('imp_place_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Imp_place_Address</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="imp_place_address" class="form-control" placeholder="Enter imp_place_address"  >
<span class="text-danger">@error ('imp_place_address') {{$message}} @enderror</span> 
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
<select name="getvillage_ids" id="getvillage_ids" class="form-control input-md" value="{{old('getvillage_ids')}}">
<option value="">-----Select village-----</option>
@foreach($getvillage_ids as $key =>$value)
<option value="{{$value->id}}">{{$value->village_name}}</option>
 @endforeach
</select>
<span class="text-danger">@error ('getvillage_ids') {{$message}} @enderror</span> 
</div>
</div>
<br>

<!-- <input type="hidden" name="village_id" id="village_id" value="{{$getid}}" >
 -->
 <br>
<div class="row">
<button type="submit" class="btn btn-primary"style="margin-left:40%;">Save</button>&nbsp;
<a href="{{url('adminhomes')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
<div class="container">
<table class="table table-striped" >
  <thead style="font-size:16px;">
      <tr>
      <th scope="col">IMP Photo</th>
      <th scope="col">IMP Name</th>
      <th scope="col">IMP Details</th>
      <th scope="col">Map_details</th>
      <th scope="col">IMP Address</th>
      <th>Edit</th>
      <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($getimpplaces as $key=>$value)
      <tr>
         
         <td><img src="/assets/images/{{$value->imp_place_photo}}" style="height:50px;width:50px;/"></td>
         <td>{{$value->imp_place_name}}</td>
         <td>{{$value->imp_place_details}}</td>
         <td>{{$value->imp_place_map_details}}</td>
         <td>{{$value->imp_place_address}}</td>
         <td><a href="{{url('editimpplace')}}/{{$value->id}}" class="btn btn-success">Edit</a></td>
         <td><a href="{{url('deleteimpplaces')}}/{{$value->id}}" class="btn btn-danger">Delete</a></td>
         </tr>
    </tbody>
    @endforeach

  </table>
</div>
</div>

@endsection()