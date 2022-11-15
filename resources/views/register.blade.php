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
 
 <body  >
<div class="container" >
    
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>


            
            <div class="col-xl-6">

             <div class="card-body p-md-5 text-black">
           <h3 style="margin-top:-10px;"><I>Registration Form</I></h3>
           <br>
           <br>
             @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
             @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif 
              
            <form action="{{url('register-save')}}" method="post" enctype="multipart/form-data">
            @csrf
          
              <div class="form-group">
              <label  for="user_name"><b>Name</label></b>
              <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter Full name" value="{{old('user_name')}}" >
              <span class="text-danger">@error('user_name'){{$message}} @enderror</span>
              </div>
              <div class="form-group">
              <label for="user_email_id"><b>Email</label></b>
             <input type="text" id="user_email_id" name="user_email_id" class="form-control"  placeholder="Enter email" value="{{old('user_email_id')}}">
              <span class="text-danger">@error ('user_email_id') {{$message}} @enderror</span>
              </div>
               <div class="form-group ">
             <label  for="user_phone_number"><b>Phone Number</label></b>
             <input type="number" id="user_phone_number" name="user_phone_number" class="form-control" placeholder="Enter Phone Number" value="{{old('user_phone_number')}}">
             <span class="text-danger">@error('user_phone_number'){{$message}} @enderror</span>
             </div>
               <div class="form-group">
              <label  for="user_age"><b>Age</label></b>
              <input type="text" id="user_age" name="user_age" class="form-control " placeholder="Enter age" value="{{old('user_age')}}">
              <span class="text-danger">@error('user_age'){{$message}} @enderror</span>
                     </div>
              <div class="form-group">
              <label for="user_village"><b>Village Name</label></b> 
              <select name="villagenames" id="villagenames" class="form-control input-md" value="{{old('villagenames')}}">
              <option value="">-----Select village-----</option>
              @foreach($villagenames as $key =>$value)
             <option value="{{$value->village_name}}">{{$value->village_name}}</option>
              @endforeach
              </select>
              <span class="text-danger">@error ('villagenames') {{$message}} @enderror</span> 
              </div>
              
              <div class="form-group ">
             <label  for="user_address"><b>Address</label></b> 
             <input type="text" id="address" name="user_address" class="form-control " placeholder="Enter address" value="{{old('user_address')}}" >
             <span class="text-danger">@error('user_address'){{$message}} @enderror</span>
             </div> 
             <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
             <label for="user_sex"><b>Gender:</label></b>
             <div class="form-check form-check-inline mb-1 me-4">
             <input class="form-check-input"  type="radio" name="user_sex" id="option1" value="F" style="margin-left:10px;" >

             <label style="margin-bottom: 2px;">Female</label>
             </div>
             
              <div class="form-check form-check-inline mb-0 me-4">
             <input class="form-check-input" type="radio" name="user_sex" id="option2"value="M"/>
            <label style="margin-bottom: 2px;">Male</label>
              </div>
              </div> 
              
             <div class="form-group">
             <label for="user_occupation"><b>Professtional</label></b>
             <input type="text" id="user_occupation" name="user_occupation" class="form-control " placeholder="Enter professtional" value="{{old('user_occupation')}}">
             </div>
             
             <div class="form-group">
             <label for="user_map_details"><b>Map</label></b>
             <input type="text" id="user_map_details" name="user_map_details" class="form-control "  value="{{old('user_map_details')}}">
             </div>

             <div class="form-group">
             <a href="{{url('pincode')}}" class="btn btn-danger" style="margin-left:20%;">Cancel</a>&nbsp;
             <button type="submit" class="btn btn-primary" style="color:white;margin-left: 8px; ">Register</button>

              <input type="hidden" name="user_id" id="user_id"  value="{{$editid->user_id}}">
             <a href="{{url('/').'/verification/'.$editid->user_id}}" id="user_id">OTP Verification</a>
             
        </div>
                 

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
</body>
</html>