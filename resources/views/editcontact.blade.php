@extends('layouts.App')
@section('main-content1')
<div class="container">
 <?php $getid = request()->segment(count(request()->segments()));?>
<B><div class="card-header" style="font-size: large;text-align: center;">Update Contact List</div></B>
<div class="card-body">
<h5 class="card-title"></h5>
<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form method="post" action="{{url('update-contact')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="contact_id" value="{{$editcontactlist->contact_id}}">
<div class="col-md-12">
 <div class="row">
<div class="col-md-6">
<B><label >Contact Photo</label></B>
<br>
</div>
<div class="col-md-6">
<a href="<?php if(isset($editcontactlist) && $editcontactlist->contact_photo){echo url('/').'/assets/images/'.$editcontactlist->contact_photo; } ?>" target="blank"> <img src="<?php if(isset($editcontactlist) && $editcontactlist->contact_photo){echo url('/').'/assets/images/'.$editcontactlist->contact_photo; } ?>" style=" height:200px;width: 200px; margin-top:-0px;margin-left:%;"></a>
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
<input type="text" name="contact_name" class="form-control" placeholder="Enter contact_name" value="<?php if(isset($editcontactlist) && $editcontactlist->contact_name){ echo $editcontactlist->contact_name; }?>">
<span class="text-danger">@error ('contact_name') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Contact Designation</label></B>
</div>
<div class="col-md-6">
<input type="text" name="contact_designation" class="form-control" placeholder="Enter contact_designation" value="<?php if(isset($editcontactlist) && $editcontactlist->contact_designation){ echo $editcontactlist->contact_designation; }?>" >
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
<input type="number" name="contact_phone_number" class="form-control" placeholder="Enter contact_phone_number" value="<?php if(isset($editcontactlist) && $editcontactlist->contact_phone_number){ echo $editcontactlist->contact_phone_number; }?>">
<span class="text-danger">@error ('contact_phone_number') {{$message}} @enderror</span> 
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
<input type="text" name="contact_email_id" class="form-control" placeholder="Enter contact_email_id" value="<?php if(isset($editcontactlist) && $editcontactlist->contact_email_id){ echo $editcontactlist->contact_email_id; }?>"  >
<span class="text-danger">@error ('contact_email_id') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Address</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="contact_address" class="form-control" placeholder="Enter contact_address" value="<?php if(isset($editcontactlist) && $editcontactlist->contact_address){ echo $editcontactlist->contact_address; }?>"  >
<span class="text-danger">@error ('contact_address') {{$message}} @enderror</span> 
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
<input type="text" name="contact_map_details" class="form-control" placeholder="Enter contact_map_details" value="<?php if(isset($editcontactlist) && $editcontactlist->contact_map_details){ echo $editcontactlist->contact_map_details; }?>"   >
<span class="text-danger">@error ('contact_map_details') {{$message}} @enderror</span> 
<br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<B><label >Contact Works</label></B>
<br>
</div>
<div class="col-md-6">
<input type="text" name="contact_works" class="form-control" placeholder="Enter contact_works" value="<?php if(isset($editcontactlist) && $editcontactlist->contact_works){ echo $editcontactlist->contact_works; }?>" >
<span class="text-danger">@error ('contact_works') {{$message}} @enderror</span> 
<br>
</div>
</div>
<div class="row">
<button type="submit" class="btn btn-success" style="margin-left:40%;">Update</button>&nbsp;
<a href="{{url('contactlist')}}" class="btn btn-danger">Back</a>
</div>
</div>
</div>
</div>
</div>
@endsection()