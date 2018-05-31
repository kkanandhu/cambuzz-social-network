<?php 
include("./head.php");

$reg = @$_POST['reg'];
//declaring variables to prevent errors
$fn = ""; //First Name
$ln = ""; //Last Name
$un = ""; //Username
$em = ""; //Email
$em2 = ""; //Email 2
$pswd = ""; //Password
$pswd2 = ""; // Password 2
$d = ""; // Sign up Date
$u_check = ""; // Check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
if ($em==$em2) {
// Check if user already exists
$u_check = mysqli_query($conn,"SELECT username FROM users WHERE username='$un'");
// Count the amount of rows where username = $un
$check = mysqli_num_rows($u_check);
//Check whether Email already exists in the database
$e_check = mysqli_query($conn,"SELECT email FROM users WHERE email='$em'");
//Count the number of rows returned
$email_check = mysqli_num_rows($e_check);
if ($check == 0) {
  if ($email_check == 0) {
//check all of the fields have been filed in
if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
// check that passwords match
if ($pswd==$pswd2) {
// check the maximum length of username/first name/last name does not exceed 25 characters
if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
echo "The maximum limit for username/first name/last name is 25 characters!";
}
else
{
// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
if (strlen($pswd)>30||strlen($pswd)<5) {
echo "Your password must be between 5 and 30 characters long!";
}
else
{
//encrypt password and password 2 using md5 before sending to database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
$query = mysqli_query($conn,"INSERT INTO users(username,first_name,last_name,email,password,sign_up_date) VALUES ('$un','$fn','$ln','$em','$pswd','$d')");
//die("<h2>Welcome to findFriends</h2>Login to your account to get started ...");
echo "<script type='text/javascript'>\n";
                    echo "alert(' Login to your account to get started ...');\n";
                    echo "</script>";
}
}
}
else {echo "<script type='text/javascript'>\n";
                    echo "alert(' Login to your account to get started ...');\n";
                    echo "</script>";

//echo "Your passwords don't match!";
}
}
else
{
  echo "<script type='text/javascript'>\n";
                    echo "alert(' Please fill in all of the fields');\n";
                    echo "</script>";

}
}
else
{
  echo "<script type='text/javascript'>\n";
                    echo "alert(' Sorry, but it looks like someone has already used that email!');\n";
                    echo "</script>";
}
}
else
{
  echo "<script type='text/javascript'>\n";
                    echo "alert(' LUsername already taken ...');\n";
                    echo "</script>";

}
}
else {
  echo "<script type='text/javascript'>\n";
                    echo "alert(' Your E-mails don't match!');\n";
                    echo "</script>";

}
}





//Login Script
if (isset($_POST["user_login"]) && isset($_POST["password_login"]))
{
$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
$md5password_login = md5($password_login);

 $sql = mysqli_query($conn,"SELECT id FROM users WHERE username='$user_login' AND password='$md5password_login' LIMIT 1");



$userCount = mysqli_num_rows($sql); //Count the number of rows returned
	if ($userCount == 1) {
		while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
	}
		 //$_SESSION["id"] = $id;
		 $_SESSION["user_login"] = $user_login;
		 header("location:profile.php");
		exit();
		} else {
      echo "<script type='text/javascript'>\n";
                    echo "alert(' That information is incorrect, try again');\n";
                    echo "</script>";
		
		exit();
	}
}


 ?>




 <!DOCTYPE html>
 <html>
 <head>
 	<title>login+signup</title>
<style>
.allSides
{
background-color: red;
}

.cover {

  position: absolute;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  width: auto;
  height: auto;
  background-image: url("./img/1.jpg");
  background-size: cover;
  -webkit-filter: blur(3px);
  z-index: 0;
}

.logo{
  color: #0000;
  font-family: 'Amatic SC', cursive;
  font-size: 38px;
  padding: 0px 50px;
}

.logo1{
	color: #b3b3b3;
    font-size: 20px;
    text-align: center;
    }

.cover1{
	 position: absolute;
  top: -20px;
  left: -20px;
  right: -40px;
  bottom: -40px;
  width: auto;
  height: auto;
  background-image: url("./2.jpg");
  background-size: cover;
  -webkit-filter: blur(5px);
  z-index: 0;

}

h1{
	 color: rgba(96, 125, 139, 0.3);
  font-family: 'Amatic SC', cursive;
  font-size: 40px;
  line-height: 60px;
  padding: 20px 10px;
  text-align: center;
}

</style>

 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <titleSignup</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
   

 </head>

 <body>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


<div class="cover">
</div>
			
			<div class="allsides" style=" height: 450px; width: 350px;  pxborder-radius: 5px; box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19)">
    <style>
        .allsides {
            background-color:white;
            position: absolute;
            height: 400px;
            width: 350px;
            margin: -100px 0 0 -200px;
            top: 40%;
            left: 20%;
            max-width: 500px;
            padding: 30px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            }
    </style>
				 <div style=" margin-left: 0px;margin-top: 0px;background-color: white; ">
        <div style="height: 20px;"> 
        </div>
        				<center>
        						<h2 style="color: rgba(205, 220, 57, 0.7); font-size: 40px"><b><center>Login</center></b></h2>
						<form action="index.php" method="post" name="form1" id="form1">
						<div style="padding-top: 10%">
						<div class="md-form">
						<input type="text" id="form1" class="form-control" name="user_login" id="user_login">
						<label for="form1" class="">Username</label>
						</div>
						<div class="md-form">
						<input type="password" id="form1" class="form-control" name="password_login" id="password_login">
						<label for="form1" class="">password</label>
						</div>

							 <div class="md-form form-group" style="width: 70px;">
                   
            </div>

						<input  class="btn btn-success" type="submit" name="login" id="button" value="login">
							
						</div>
						</form>
						<div class="msg">
                        <style>
                            .msg {
                                color: #b3b3b3;
                                font-size: 14px;
                                text-align: center;
                                }
                            .msg a {
                                color: #EF3B3A;
                                text-decoration: none;
                                }
                        </style>
                        <a href="./fp1.php" style="color: #00C853">    
                           Forgot password?
                        </a>
                        <br>
                    </div>
						</div>
						</div>

					<div class="signupdiv" style=" ;border-radius: 5px;">
		<style>
			.signupdiv {
				background-color:white;
				position: absolute;
   			 	margin: -100px 0 0 -200px;
   			 	top: 20%;
   			 	left: 50%;
   			 	margin-left: 100px;
				}
		</style>
						<div class="card" style="width: 400px; height: 100%; box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19) ">
    	<div class="card-block">

       		 <!--Header-->
        	<div class="text-center">
           		 <h3><i></i><div class="logo1">New to Cambuzz? Enter your deatils</div></h3>

           		<!-- <hr class="mt-2 mb-2"> -->
       		 </div><center>
						<form action="#" method="post">
						<div class="md-form">
						<input  name="fname"      type="text" id="form1" class="form-control" placeholder="Firstname" style="height: 3%;" >
						</div><div class="md-form">
						<input  name="lname"      type="text" id="form1" class="form-control" placeholder="Lastname" style="height: 3%;" >
						</div><div class="md-form">
						<input  name="username"      type="text" id="form1" class="form-control" placeholder="Username" style="height: 3%;" >
						</div><div class="md-form">
						<input  name="email"      type="text" id="form1" class="form-control" placeholder="email" style="height: 3%;" >
						</div><div class="md-form">
						<input  name="email2"      type="text" id="form1" class="form-control" placeholder="Confirm email" style="height: 3%;" >
						</div><div class="md-form">
						<input  name="password"      type="password" id="form1" class="form-control" placeholder="Password" style="height: 3%;" >
						</div><div class="md-form">
						<input  name="password2"      type="password" id="form1" class="form-control" placeholder="Confirm password" style="height: 3%;" >
						</div><div class="md-form">
						
						<input  class="btn btn-success" type="submit" name="reg" id="button" value="Signup">
						</form>
							</center>


 
 </body>
 </html>