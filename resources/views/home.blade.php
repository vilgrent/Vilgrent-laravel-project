@extends('layouts.master')
@section('main-content')


<h1 style="margin-left:2%;">Welcome to TN605105 Villages</h1>
<br>
<br>

<table class="table">
<thead>
</thead>
  <tbody>
      
      @foreach($village_details as $key=>$value)
      <tr>
      <img src="/assets/images/{{$value->village_image}}" style="height:50px;width:50px;margin-left:4%;/">&nbsp;&nbsp;
     <a href="{{url('/').'/village/'.base64_encode($value->id)}}" style="font-size:20px;">{{$value->village_name}}</a></tr>&nbsp;&nbsp;
    
    </tbody>
    @endforeach
  </table>
  <br>
  <a href="{{url('/').'/pincode/'}}" class="btn btn-danger" style="margin-left:2%;">Back</a>
<br>

@endsection 