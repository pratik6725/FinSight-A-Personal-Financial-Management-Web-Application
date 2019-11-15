<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FinSight Login</title>
    <link rel="stylesheet" type="text/css" href="{% static 'cricbee/main.css' %}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	
    <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from managing your own money!</p>
                        <a href="http://localhost:8080/signup_db/signup.html"><input type="submit" name="signup" value="SignUp"></a><br/>
                    </div>
                    
                    <div class="col-md-9 register-right">
                                <h3 class="register-heading">Login<br/></h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                        <form role="form" action="" method="post" id="" name="login">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" name="email" autofocus="" required="true">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password" value="" required="true">
                                            <a href="forgot-password.php">Forgot Password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" value="login" name="login" class="btnRegister">Login</button>
                                        </div>
                                        </form>

                                    </div>  
                                </div>
                     </div>

                 </div>

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
