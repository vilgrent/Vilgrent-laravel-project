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
<div class="container-fluid">
<div class="row">
<div class="col-md-4" style="background-color:#fe4066;">
<h1 style="color:white;margin-top:43%;margin-left:30%;">Welcome to Login</h1>
<h5 style="color:white;margin-top:4%;margin-left:29%;"><b>Don't have an account ! Register Here</b></h5>
<a href="{{url('registerpage')}}"class="btn btn-outline-info " 
style="background-color:#fe4066;color:white;border-radius: 40px;margin-left:40%;width:30%;font-size:100%;margin-top:4%;">Sign Up</a>

  
</div>

<div class="col-md-8" style="background-color:#fe4066;">

<section class="h-100 gradient-form" style="margin-left:;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="image/vilgrentlago.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Vilgrent Team</h4>
                </div>
              
  @if($errors)
  @foreach($errors->all() as $error)
  <p class="text-danger">{{$error}}</p>
  @endforeach
  @endif


  @if(Session::has('error'))
  <p class="text-danger">{{session('error')}}</p>
  @endif
  <form action="{{url('login-save')}}" method="post" enctype="multipart/form-data">
    @csrf
     
   <p style="margin-top: -10;">Please login to your account</p>
    <div class="form-group" >
      <label for="user_phone_number">Mobile Number:</label>
      <input type="number" class="form-control" id="user_phone_number" name="user_phone_number" placeholder="Enter Mobile Number"  >
      
    </div>
    <div class="form-group" >
      <label for="pin_number">Pin Number:</label>
      <input type="password" class="form-control" id="pin_number" name="pin_number" placeholder="Enter Pin Number" >
      
    </div>
    <div class="form-group">
     <label for="role_as"></label>
     <select class="form-control" id="role_as" name="role_as" >
       <option>---select----</option>
       <option  value="0">User</option>
       <option  value="1">Admin</option>
      
     </select>
    
   </div>
    
    <button type="submit" class="btn" style="background-color:#fe4066;color:white;">Sign In</button>
    
    <a href="{{url('pincode')}}" class="btn" style="background-color:#fe4066;color:white;">Cancel</a>

   
  </form>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>

</div>
</div>
</body>
</html>

