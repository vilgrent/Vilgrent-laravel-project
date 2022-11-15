@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
 <h1 style="margin-left:2%;color: #721c24;"><I>Photos</I></h1>
<a href="{{url('/').'/village/'.$getid}}" class="btn btn-success" style="margin-left:22%;">Back</a>
<br>

<div class="container" style="border-style: double;border-color:#721c24;">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 10px;border-style: double;border-color:#721c24;">
<ol class="carousel-indicators">
<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
</ol>
  
<div class="carousel-inner">
<div class="carousel-item active">
<img class="d-block w-100" src="/image/schools.jpg" alt="0 slide" style="height: 400px; " >

</div>
<div class="carousel-item">
<img class="d-block w-100" src="/image/temple1.jpg" alt="1 slide" style="height: 400px;" >

</div>
<div class="carousel-item">
<img class="d-block w-100" src="/image/river.png" alt="2 slide" style="height: 400px; " >

</div>
<div class="carousel-item">
<img class="d-block w-100 " src="/image/hospitals.jpg" alt="3 slide" style="height: 400px; ">

</div>
<div class="carousel-item">
<img class="d-block w-100" src="/image/river1.jpg" alt="4 slide" style="height: 400px;" >

</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
<br>
</div>
</div>
<br>
<div class="col-md-12">
<div class="row">
@foreach($getphotos as $key=>$value)

<div class="col-md-4" style="" >
<img src="/assets/images/{{$value->img_src}}"  class="img-thumbnail" style="height:80%;width:80%;margin-left:33px;border;border-color:#721c24;"><br><br>
<div class="details" style="margin-left:40px;font-size:25px;font-style:italic;">
 <span style="margin-left:7%;">{{$value->photo_details}}</span><br>


</div>
</div>

@endforeach
</div>









<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


@endsection
