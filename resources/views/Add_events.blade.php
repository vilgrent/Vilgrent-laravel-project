@extends('layouts.App')
@section('main-content1')
<div class="container">
<b><div class="card-header" style="font-size:large;text-align: center;">Add Events</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif 
<form method="post" action="{{url('insert-events')}}" enctype="multipart/form-data">
@csrf

<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Event Image</label></B>
<br>
</div>
<div class="col-md-6">
<img src=""style="height:50px;width:50px;">
<input type="file" name="file" class="form-control"   >
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>
</br>
<div class="row">
<div class="col-md-6">
<B><label >Event Name</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="event_name" class="form-control" placeholder="Enter Event_Name"  >
<span class="text-danger">@error ('event_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Event Date</label></B>
<br>
</div>
<div class="col-md-6">
<input type="date" name="event_date" class="form-control" placeholder="Enter Event_Name"  >
<span class="text-danger">@error ('event_date') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >EventStart_Date</label></B>
<br>
</div>
<div class="col-md-6">
<input type="date" name="event_start_date" class="form-control" placeholder="Enter Event_Name"  >
<span class="text-danger">@error ('event_start_date') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >EventEnd_Date</label></b>
<br>
</div>
<div class="col-md-6">
<input type="date" name="event_end_date" class="form-control" placeholder="Enter Event_Name"  >
<span class="text-danger">@error ('event_end_date') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Villages</label></B>
</div>
<br>
<div class="col-md-6" > 
<select name="getvillages" id="getvillages" class="form-control input-md" value="{{old('getvillages')}}" >
<option value="">-----Select village-----</option>
@foreach($getvillages as $key =>$value)
<option value="{{$value->id}}">{{$value->village_name}}</option>
 @endforeach
</select>
<span class="text-danger">@error ('getvillages') {{$message}} @enderror</span> 
</div>
</div>
<br>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Address</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="address" class="form-control" placeholder="Enter Address">
<span class="text-danger">@error ('address') {{$message}} @enderror</span>

<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Event Map_details</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="event_map_details" class="form-control" placeholder="Enter event_map_details"  >
<span class="text-danger">@error ('event_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<br>
<div class="row">
<button type="submit" class="btn btn-primary" style="margin-left:40%;">Save</button>
&nbsp;<a href="{{url('adminhomes')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
</div>
<br>
<br>
<div class="container">
<table class="table table-striped" >
  <thead style="font-size:16px;">
      <tr>
      <th scope="col">Event Photo</th>
      <th scope="col">Event Name</th>
      <th scope="col">Event Date</th>
      <th scope="col">Event start Date</th>
      <th scope="col">Event End date</th>
      <th scope="col">Address</th>
      <th scope="col">Map_details</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
      <th></th>
      <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($geteventsdetails as $key=>$value)
      <tr>
         
         <td><img src="/assets/images/{{$value->event_photo}}" style="height:50px;width:50px;/"></td>
         <td>{{$value->event_name}}</td>
         <td>{{$value->event_date}}</td>
         <td>{{$value->event_start_date}}</td>
         <td>{{$value->event_end_date}}</td>
         <td>{{$value->address}}</td>
         <td>{{$value->event_map_details}}</td>
         <td><a href="{{url('editevent')}}/{{$value->id}}" class="btn btn-success">Edit</a></td>
         <td><a href="{{url('deleteevent')}}/{{$value->id}}" class="btn btn-danger">Delete</a></td>
         </tr>
    </tbody>
    @endforeach

  </table>
</div>
</div>

@endsection()