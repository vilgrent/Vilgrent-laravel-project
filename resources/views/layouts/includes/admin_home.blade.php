@extends('layouts.App')
@section('main-content1')
<div class="container-fluid">
<nav class="navbar navbar-inverse  navbar-fixed-top navbar-dark bg-dark"  style="color: white;z-index:1;" >
<div class="collapse navbar-collapse" id="navbarText">
<ul class="navbar-nav mr-auto">
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('newvillage')}}">Villages</a>
</li>
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('addphoto')}}">Photos</a>
</li>
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('addevents')}}">Events</a>
</li>
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('placetoVisit')}}">Place to visit</a>
</li>
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('contactlist')}}">Contact list</a>
</li>
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('shops')}}">Shops</a>
</li>
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('hotels')}}">Hotels</a>
</li>
<li class="nav-item " style="font-size:25px;">
<a class="nav-link" href="{{url('imp_places')}}">Important Places</a>
</li>

<li class="nav-item">
<a href="{{url('pincode')}}"  style="color:white;font-size:25px;margin-left:1000%;">Logout</a>
</li>
</ul>
</div>

</nav> 
</div>
@endsection()