@extends('layouts.master')
@section('title','firebase')
@section('main-content')

<div class="container">

    <h1 style="margin-left: 300px;"> Phone Number Verification</h1>
    <br>
  
    <div class="alert alert-danger" id="error" style="display: none;"></div>
  
    <div class="card" style="width:500px;margin-left: 300px;">
      <div class="card-header">
        Enter Phone Number
      </div> 
      <div class="card-body">
  
        <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
        
      
        <form>
            <label for="phone_no">Phone Number:</label>
            <input type="text" id="number" name="phone_no" class="form-control" placeholder="+91********">
            <div id="recaptcha-container"></div>
            <button type="button" class="btn btn-success" onclick="phoneSendAuth();">SendCode</button>
        </form>
      </div>
    </div>
      
    <div class="card" style="margin-top: 20px;width: 500px;margin-left: 300px;">
      <div class="card-header">
        Enter Verification code
      </div>
      <div class="card-body">
  
        <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
  
        <form>
            <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">
            <br>
            <button type="button" class="btn btn-success" onclick="codeverify();">Verify code</button> 
           
            <a href="{{url('/').'/registerpage/'}}" class="btn btn-danger">Cancel</a>
            <a href="{{url('/').'/pin/'}}">Pin Verification</a>

            
        </form>
       
      </div>
    </div>
  
</div>
  
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
<script>
  
  var firebaseConfig = {
  apiKey: "AIzaSyCq9kZf5iG29a2ZTbEZf8IXXsw9lkSwdZY",
  authDomain: "myproject-b549e.firebaseapp.com",
  databaseURL:"https://myproject-b549e-default-rtdb.firebaseio.com/",          
  projectId: "myproject-b549e",
  storageBucket: "myproject-b549e.appspot.com",
  messagingSenderId: "622064193476",
  appId: "1:622064193476:web:200c9f66f02891ab529e91",
  measurementId: "G-VZZZPEHZS4"
  };

  // Initialize Firebase
   firebase.initializeApp(firebaseConfig);
   
</script>
  
<script type="text/javascript">
  
    window.onload=function () {
      render();
    };
  
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
  
    function phoneSendAuth() {
           
        var number = $("#number").val();
          
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
              
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
  
            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();
              
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
  
    }
  
    function codeverify() {
  
        var code = $("#verificationCode").val();
  
        coderesult.confirm(code).then(function (result) {
            var user=result.user;
            console.log(user);
            window.location.href="adminlogin";
            $("#successRegsiter").text("you are register Successfully.");
            $("#successRegsiter").show();
  
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
  
</script>
@endsection