@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
<h1 style="margin-left:2%;color: #721c24;"><I>Contact List</I></h1>
<br>
<a href="{{url('/').'/village/'.$getid}}" class="btn btn-success" style="margin-left:2%;">Back</a>
<br>
<br>
<br>
<div class="col-md-12">
<div class="row">
@foreach($getcontactinfo as $key=>$value)

<div class="col-md-4" style="" >
<img src="/assets/images/{{$value->contact_photo}}"  class="img-thumbnail" style="height:50%;width:50%;margin-left:33px;border;border-color:blue;"><br>
<div class="details" style="margin-left:40px;font-size:25px;font-style:italic;">
Contact Name: <span>{{$value->contact_name}}</span><br>
Contact Designation: <span>{{$value->contact_designation}}</span><br>
Phone Number: <span>{{$value->contact_phone_number}}</span><br>
Email: <span>{{$value->contact_email_id}}</span><br>
Address: <span>{{$value->contact_address}}</span><br> 
Contact Works <span>{{$value->contact_works}}</span> 

</div>
</div>

@endforeach
</div>
</div>

@endsection 