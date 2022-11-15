@extends('layouts.App')
@section('main-content1')
<center><h4>Add Village photos</h4>

<div class="container">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<form method="post" action="{{url('insertPhotos')}}" enctype="multipart/form-data">
@csrf
<br>
<div class="row" style="">
<div class="col-md-6">
<B><label>Photo Title</label></B>
</div>
<br>
<div class="col-md-6" style="margin-left:-15%;">
<input type="text" name="photo_details" class="form-control" placeholder="Enter  Photo_Details" style="width:60%;">
<span class="text-danger">@error ('photo_details') {{$message}} @enderror</span> 
</div>
</div>
<br>
<div class="row">
<div class="col-md-6"> 
<B><label style="margin-left:">Village</label></B>
</div>
<br>
<div class="col-md-6" style="margin-left:-15%;"> 
<select name="getvillage" id="getvillage" class="form-control input-md" style="width:60%;" value="{{old('getvillage')}}">
<option value="">-----Select village-----</option>
@foreach($getvillage as $key =>$value)
<option value="{{$value->id}}">{{$value->village_name}}</option>
 @endforeach
</select>
<span class="text-danger">@error ('getvillage') {{$message}} @enderror</span> 
</div>
</div>
<br>
<div class="row" style="">

<div class="col-md-6"> 
<B><label style="margin-left:">Image</label></B>
</div>
<br>
<div class="col-md-6" style="margin-left:-15%;"> 
<input type="file" name="file" class="form-control" style="width:60%;">
<span class="text-danger">@error ('file') {{$message}} @enderror</span>
</div>

</div>
<br>
<div class="row" style="">
<div class="col-md-12">
<button type="submit" class="btn btn-success" style="margin-left:-20px;">upload</button>
&nbsp;&nbsp;&nbsp;<a href="{{url('adminhomes')}}" class="btn btn-danger" style="">Back</a>&nbsp;&nbsp;


</form>        
</div>
<br>
<br>
<table class="table table-striped" style="width:900px;margin-left:10%;" >
  <thead style="font-size:16px;">
      <tr>
      <th scope="col">Village_Photo</th>
      <th scope="col">Village Name</th>
      <th scope="col">Primary Image</th>
      <th scope="col">Secondary Image</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach($getvillageimages as $key=>$value)
      <tr>
      <td><?php
     $image='';
     if(isset($value->img_src) && $value->img_src != "") 
      {
        $image=url('/').'/assets/images/'.$value->img_src;
      }
      else{
        $image='';
      }
    ?><a href="{{$image}}" target="blank"> 
   <img src="{{$image}}" style="height:50px;width:50px;/"></a></td>
         <td style="margin-left:-20%;">{{$value->photo_details}}</td>
         <td><input type="radio"  class="custom-control" data-id="{{$value->id_village}}"  value="1" data-rowid="{{$value->photo_id}}" @if($value->photo_type==1)checked> @endif<lable >Primary Image</lable></td>
         <td><input type="radio"  class="custom-control" data-id="{{$value->id_village}}" value="2" data-rowid="{{$value->photo_id}}" @if($value->photo_type==2)checked> @endif<lable >Secondary Image</lable></td>
         <td><a href="{{url('deletephotos')}}/{{$value->photo_id}}" class="btn btn-danger">Delete</a></td>
         </tr>
    </tbody>
    @endforeach                    
  </table>
  </div>
  </center>
@endsection() 
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){

  $('.custom-control').click(function() { 
    var X= confirm("Are you Sure you want Update");
  if(X){
  $.ajax({ 
        url:'updateImage',
        type:'POST',
        data:{'_token':'{{csrf_token()}}','photo_type':$(this).val(),'id':$(this).data('rowid')},
        success:function(res){
        alert(res);
        window.location.reload();
      },
      error:function(res){
        alert("Error");
        window.location.reload();
      }
      });
    }
    });
  
  });
    


</script>

