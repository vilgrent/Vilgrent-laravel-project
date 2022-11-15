@extends('layouts.App')
@section('main-content1')
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form method="post" action="{{url('update-event')}}" enctype="multipart/form-data">
@csrf
<b><div class="card-header" style="font-size: large;text-align: center;">Update Events</div></b>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">

<input type="hidden" name="id" value="{{$editevents->id}}">
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<b><label >Event Image</label></b>
<br>
</div>
<div class="col-md-6">
<a href="<?php if(isset($editevents) && $editevents->event_photo){echo url('/').'/assets/images/'.$editevents->event_photo; } ?>" target="blank"> <img src="<?php if(isset($editevents) && $editevents->event_photo){echo url('/').'/assets/images/'.$editevents->event_photo; } ?>" style=" height:200px;width: 200px; margin-top:-0px;margin-left:%;"></a>
<input type="file" name="file" class="form-control">
<span class="text-danger">@error ('file') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >Event Name</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="event_name" class="form-control" placeholder="Enter Event_Name" value="<?php if(isset($editevents) && $editevents->event_name){ echo $editevents->event_name; }?>">
<span class="text-danger">@error ('event_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >Event Date</label></b>
<br>
</div>
<div class="col-md-6">
<input type="date" name="event_date" class="form-control" placeholder="Enter event_date"  value="<?php if(isset($editevents) && $editevents->event_date){ echo $editevents->event_date; }?>">
<span class="text-danger">@error ('event_date') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >EventStart_Date</label></b>
<br>
</div>
<div class="col-md-6">
<input type="date" name="event_start_date" class="form-control" placeholder="Enter event_start_date" value="<?php if(isset($editevents) && $editevents->event_start_date){ echo $editevents->event_start_date; }?>">
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
<input type="date" name="event_end_date" class="form-control" placeholder="Enter Event_Name" value="<?php if(isset($editevents) && $editevents->event_end_date){ echo $editevents->event_end_date; }?>">
<span class="text-danger">@error ('event_end_date') {{$message}} @enderror</span> 
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
<input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php if(isset($editevents) && $editevents->address){ echo $editevents->address; }?>">
<span class="text-danger">@error ('address') {{$message}} @enderror</span>
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<b><label >Event Map_details</label></b>
<br>
</div>
<div class="col-md-6">
<input type="text" name="event_map_details" class="form-control" placeholder="Enter event_map_details" value="<?php if(isset($editevents) && $editevents->event_map_details){ echo $editevents->event_map_details; }?>"  >
<span class="text-danger">@error ('event_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<div class="row">
<button type="submit" class="btn btn-success" style="margin-left:40%;">update</button>
&nbsp;<a href="{{url('addevents')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection()