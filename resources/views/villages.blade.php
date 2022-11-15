@extends('layouts.master')
@section('main-content')
<?php $getid = request()->segment(count(request()->segments()));?>
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form action="{{url('updatesubscribe')}}" method="POST" id="subcribeupdate">
  @csrf
<input type="hidden" name="user_id" id="user_id" value="{{$getuserid->user_id}}">
<input type="hidden" name="subscribe_villageid" id="subscribe_villageid" value="{{$getid}}"> 
<button type="submit" class="btn btn-danger" id="checksubscribe" value="{{$getuserid->user_id}}" onclick ="PageLoad(1);" 
style="margin-left:85%;margin-top:;border;border-color: Red;border-radius:10px;color:white;width:150px;height:60px;">SUBSCRIBE</button>
</form>
<a href="{{url('pincode')}}" class="btn btn-danger" style="margin-left:22%;">Back</a>
<div class="container" style="border-style: double;border-color:#721c24;">
<div class="row" style="margin-top:10%;">
<div class="col-md-4">
<img src="/image/photos.jpg" class="img-thumbnail" style="height:80%;width:80%;margin-left:33px;border;border-color:#721c24;">
<br>
<br>
<a href="{{url('/').'/photos/'.$getid}}" class="btn btn-success" style="margin-left:40%;">Photos</a>
</div>
<div class="col-md-4">
<img src="/image/events.jpg" class="img-thumbnail" style="height:80%;width:80%;margin-left:33px;border;border-color:#721c24;">
<br>
<br>
<a href="{{url('/').'/events/'.$getid}}" class="btn btn-success" style="margin-left:40%;">Events</a>
</div>
<div class="col-md-4">
<img src="/image/river.png" class="img-thumbnail" style="height:80%;width:80%;margin-left:33px;border;border-color:#721c24;">
<br><br>
<a href="{{url('/').'/placestovisit/'.$getid}}" class="btn btn-success" style="margin-left:37%;">Places to Visit</a>
</div>
</div>
<br>
<br>
<div class="row">
<div class="col-md-4">
<img src="/image/contact.jpg" class="img-thumbnail" style="height:80%;width:80%;margin-left:33px;border;border-color:#721c24;">
<br><br>
<a href="{{url('/').'/showcontact/'.$getid}}" class="btn btn-success" style="margin-left:37%;">Contact List</a>
</div>
<div class="col-md-4">
<img src="/image/shop.jpg" class="img-thumbnail" style="height:80%;width:80%;margin-left:33px;border;border-color:#721c24;">
<br><br>
<a href="{{url('/').'/shoplist/'.$getid}}" class="btn btn-success" style="margin-left:37%;">Shops</a>
</div>
<div class="col-md-4">
<img src="/image/hotel.jpg" class="img-thumbnail" style="height:80%;width:80%;margin-left:33px;border;border-color:#721c24;">
<br><br>
<a href="{{url('/').'/hotel/'.$getid}}" class="btn btn-success" style="margin-left:37%;">Hotels</a>
</div>
</div>
<br>
<br>
<div class="row">
<div class="col-md-4" style="margin-left:33%;">
<img src="/image/temple1.jpg" class="img-thumbnail" style="height:80%;width:80%;margin-left:36px;border;border-color:#721c24;">
<br><br>
<a href="{{url('/').'/showimpplace/'.$getid}}" class="btn btn-success" style="margin-left:31%;">Important Places</a>
</div>
</div>


@endsection


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>  

 
 $(document).ready(function(){
    
   $(document).on('click','#checksubscribe',function(){
    var X= confirm("Are you Sure you want Update");
    if(X){
        $('#subscribe_villageid').val($('#subscribe_villageid').val());
        $('#user_id').val($('#user_id').val());
        url:BASE_V+'updatesubscribe',
        type:'POST',
        data:$("form#subcribeupdate").serialize(),
     success:function(res){
        alert(res);
        window.location.reload();
      },
      error:function(res){
        alert("Error");
        window.location.reload();
      }
    }
    });
  
  });
//alert($('#subscribe_villageid').val());
    //alert($('#user_id').val());

</script>

