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

/*
echo "$fn       ";
echo "$ln       ";
echo "$un     ";
echo "$em       ";
echo "$em2      ";
echo "$pswd       ";
echo "$pswd2       ";
*/









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
die("<h2>Welcome to findFriends</h2>Login to your account to get started ...");
}
}
}
else {
echo "Your passwords don't match!";
}
}
else
{
echo "Please fill in all of the fields";
}
}
else
{
 echo "Sorry, but it looks like someone has already used that email!";
}
}
else
{
echo "Username already taken ...";
}
}
else {
echo "Your E-mails don't match!";
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
		 $_SESSION["id"] = $id;
		 $_SESSION["user_login"] = $user_login;
		 header("location:grill.php");
		exit();
		} else {
		echo 'That information is incorrect, try again';
		exit();
	}








}



 ?>












<!DOCTYPE html>
<html>
<head>
	<title></title>
									<meta charset="utf-8">
									<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
									<meta http-equiv="x-ua-compatible" content="ie=edge">
									<title>Material Design Bootstrap</title>
									<!-- Font Awesome -->
									<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
									<!-- Bootstrap core CSS -->
									<link href="css/bootstrap.min.css" rel="stylesheet">
									<!-- Material Design Bootstrap -->
									<link href="css/mdb.min.css" rel="stylesheet">
									<!-- Your custom styles (optional) -->
									<link href="css/style.css" rel="stylesheet">
									<link rel="stylesheet" type="text/css" href="login.css">

</head>
<body style="background-color: #EEEEEE">

									<!-- /Start your project here-->
									<!-- SCRIPTS -->
									<!-- JQuery -->
									<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
									<!-- Bootstrap tooltips -->
									<script type="text/javascript" src="js/tether.min.js"></script>
									<!-- Bootstrap core JavaScript -->
									<script type="text/javascript" src="js/bootstrap.min.js"></script>
									<!-- MDB core JavaScript -->
									<script type="text/javascript" src="js/mdb.min.js"></script>


    
<div class="container">
  <div class="row">
   
 <div class="col  col-md-8" style="background-color: red;" >      

			<div class="allsides" style="  height: 350px;border-radius: 5px;">
			<div style="padding: 15px;">

			<style>
			.allsides {
				
			background-color:white;
			position: absolute;
			height: 200px;
			width: 400px;
			}
			</style>


			<div style="float: left;">
			<h2>Already a Memeber? Login below ...</h2>
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
						<input type="submit" name="login" id="button" value="login">
						</div>
						<a href="./fp.php ">forget passsword?</a>
			</form>
			</div>
			</div>
			</div>
			












      
    </div>
    
    <div class="col col-md-4 " style="background-color: transparent;">
     
    			<div style="background-color: transparent;margin-top: 20px;width: 80%;">
    				
		 <form action="#" method="post">
		<input  name="fname"      type="text" id="form1" class="form-control" placeholder="Firstname" style="height: 3%;" >
		<input  name="lname"      type="text" id="form1" class="form-control" placeholder="Lastname" style="height: 3%;" >
		<input  name="username"      type="text" id="form1" class="form-control" placeholder="Username" style="height: 3%;" >
		<input  name="email"      type="text" id="form1" class="form-control" placeholder="email" style="height: 3%;" >
		<input  name="email2"      type="text" id="form1" class="form-control" placeholder="Confirm email" style="height: 3%;" >
		<input  name="password"      type="password" id="form1" class="form-control" placeholder="Password" style="height: 3%;" >
		<input  name="password2"      type="password" id="form1" class="form-control" placeholder="Confirm password" style="height: 3%;" >
		<input type="submit" name="reg" value="Sign Up!">
		</form>
				





















    			</div>





















    </div>

  </div>
</div>









	


</body>
</html>
