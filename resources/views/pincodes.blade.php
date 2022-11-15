@extends('layouts.master')
@section('main-content')

<h3 style="margin-left:2%;"><I>Click anyone of the below pincode to explore villages under them</I></h3>
<br>
<br>
@foreach($village_detail as $key=>$value)
      <tr>
      <a href="{{url('home')}}" style="margin-left:2%;font-size:25px;">{{$value->village_pin_code}}</a></tr><br>
     @endforeach

@foreach($getpincode as $key=>$value)
      <tr>
      <a href="{{url('postalcode')}}" style="margin-left:2%;font-size:25px;">{{$value->village_pin_code}}</a></tr><br>
 @endforeach


  
@endsection