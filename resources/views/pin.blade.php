<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yeild('title')</title>
 <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>
<div class="card" style="width:40rem;height:500px;margin-left: 33%;margin-top:10%;" >

@if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
             @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
  <form action="{{url('pin-numberupdate')}}" method="post" enctype="multipart/form-data" >
    @csrf
  <div class="card-body">
    <h5 class="card-title" style="margin-left:40%;margin-top:40px;">PIN NUMBER</h5>
    <p class="card-text" style="margin-left:30%;margin-top:40px;">Pleace Enter You Pin Number</p>
    <label for="pin_number"><b>Pin Number</b></label>
    <input type="password" name="pin_number"class="form-control" placeholder="Enter your pinnumber" >
    <span class="text-danger">@error('pin_number'){{$message}} @enderror</span><br>
    <label><b>Confirm Number</b></label>
    <input type="password" name="confirm_pinnumber" class="form-control" placeholder="Enter your confirm_pinnumber" >
    <span class="text-danger">@error('confirm_pinnumber'){{$message}} @enderror</span>
    <br>
    <button type="submit" class="btn btn-primary" style="color: white;margin-left: 45%; ">save</button>
    <a href="{{url('/').'/registerpage/'}}" class="btn btn-danger">Cancel</a>
    
</div>
</div>
</form>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
