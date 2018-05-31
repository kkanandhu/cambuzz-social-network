<?php 

include("./head.php");
$user= $_SESSION["user_login"];

if($user)
{
	
}
else
{
	die("you must be logeed in");
}

  //Check whether the user has uploaded a profile pic or not
  $check_pic = mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user'");
  $get_pic_row = mysqli_fetch_assoc($check_pic);
  $profile_pic_db = $get_pic_row['profile_pic'];
  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  }

//profile image upload
  if (isset($_FILES['profilepic'])) {
   if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576)) //1 Megabyte
   	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$rand_dir_name = substr(str_shuffle($chars), 0, 15);
		mkdir("userdata/profile_pics/$rand_dir_name");


		if (file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
		{
		echo @$_FILES["profilepic"]["name"]." Already exists";
		}
		else
		{
		move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
		//echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
		
		$profile_pic_name = @$_FILES["profilepic"]["name"];
		$profile_pic_query = mysqli_query($conn,"UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");

		

     echo "<script type='text/javascript'>\n";
                    echo "alert(' profilepic updated sucessfully..');\n";
                    echo "</script>";
      header("Location:./profile.php");

		}
 	}
   	else
   	{
 
   			echo "IMAGE INVALID FORMAT";

   	}
  }


?>

<!DOCTYPE html>
<html>
<head>
  <title>  edit profile</title>



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
    <link rel="stylesheet" type="text/css" href="./login.css">

<!--style of the whole page-->
    <style>
      
      body {
  background-color: #FFF;
  margin: 0;
  padding: 0;
}

#cover {
  background: url("http://www.agarum.com/photos/1/3/73/822/c/l/ba29ebd25b9e4936c6607d8c5a7ff0d8.jpg")
     no-repeat
   center bottom;
  background-size:cover;
   background-attachment: fixed;
  height: 900px;
  position: relative;
  top: -55px;
  width: 100%;
}

.navigation {
  background-color: rgba(255, 255, 255, 0.9);
  overflow-y: auto;
  position: fixed;
  left: 0;
  top: 0;
  text-align: center;
  width: 100%;
  z-index: 10000;
}

ul {
  padding: 0;
}

li {
  color: #14213D;
  display: inline-block;
  font-family: 'Abel', sans-serif;
  font-size: 16px;
  font-weight: 300;
  margin: 16px 20px;
  text-transform: uppercase;
}

#logo {
  color: #FCA311;
  font-family: 'Amatic SC', cursive;
  font-size: 38px;
  padding: 0px 50px;
}

.cover-content {
  box-sizing: border-box;
  margin: 0 auto;
  position: relative;
  text-align: center;
  top: 280px;
  width: 70%;
}

h1 {
  color: #FCA311;
  font-family: 'Amatic SC', cursive;
  font-size: 80px;
  line-height: 60px;
  padding: 20px 10px;
  text-align: center;
}

h2 {
  color: #FFF;
  font-family: 'Raleway', sans-serif;
  font-size: 38px;
  font-weight: 300;
  text-align: center;
}

h3 {
  color: #14213D;
  font-family: 'Abel', sans-serif;
  font-size: 28px;
  text-align: center;
  text-transform: uppercase;
}

h4 {
  color: #FCA311;
  font-family: 'Abel', sans-serif;
  font-size: 28px;
  margin: 0px 0px 50px 0px;
}

h5{
  color: #FCA311;
  font-family: 'Abel', sans-serif;
  font-size: 24px;
  margin: 0px 0px 50px 0px;
}

p {
  color: #333;
  font-family: 'Raleway', sans-serif;
  font-size: 16px;
  font-weight: 300;
}

a {
  text-decoration: none;
}

.btn {
  color: #FFF;
  font-family: 'Amatic SC', cursive;
  font-size: 15px;
  padding: 14px;
}

.btn1 {
  background-color: #14213D;
  color: #FFF;
  font-family: 'Amatic SC', cursive;
  font-size: 26px;
  padding: 14px;
}

.posts {
  background: #EEEFF1;
  box-sizing: border-box;
  width: 90%;
  margin: 20px auto;
  padding: 20px 0px;
  text-align: center;
}

.post {
  display: inline-block;
  margin: 0px 2% 80px 2%;
  text-align: center;
  width: 45%;
  border-radius: 10px; 
  background: #EEEFF1; ;
}

.product img {
  width:100%;
}

.blue {
  color: #14213D !important;
}

.h{
  background-color: #FCA311;
  color: #FFF;
  font-family: 'Arial', cursive;
  font-size: 15px;
  padding: 14px;

}

.last{
  box-sizing: border-box;
  width: 90%;
  margin: 20px auto;
  padding: 20px 0px;
  text-align: center;

}

.container{
display: inline-block;
  margin: 0px 2% 80px 2%;
  text-align: center;
  width: 45%;

}



    </style>


</head>
<body>

<div id="logo"> Profie Settings</div>


<div class="posts">
<div class="post" >
<div class="container">
<p>Choose a picture</p>
<form method="POST" enctype="multipart/form-data">
<img src="<?php echo "$profile_pic";?>" style="width: 150px;height: 150px;"><br  />
<input type="file" name="profilepic"><br>
 <input type="submit" name="uploadpic" class="btn btn-success"  value="upload">
  
</form>
</div>
</div>

<div class="post">

<form action="account_setting.php" method="post">
<p>UPDATE PROFILE INFO</p>
<input type="text" name="fname"  id="fname" size="50" placeholder="Firstname" style="text-align:center; "> <br   /><br   />
<input type="text" name="lname"  id="lname" size="50" placeholder="Lastname" style="text-align:center; "><br   /><br   />
<textarea name="aboutyou" id="aboutyou" rows="6" cols="50" placeholder="your skills" style="text-align:center; height: 40px;"></textarea>
<input type="submit"  name="submit"  class="btn btn-success" id="senddata" value="update">
 </form>

</div>
</div>
<div class="posts">


<div class="post">
<form action="account_setting.php" method="post">
<p>CHANGE PASSWORD</p>
<input type="password" name="pass"  id="pass" size="50" placeholder="old password" style="text-align:center; "> <br   /><br   />
<input type="password" name="npass"  id="npass" size="50" placeholder="new password" style="text-align:center; "><br   /><br   />
<input type="password" name="cpass" id="cpass" size="50"  placeholder="confirm password" style="text-align:center; ">

<input type="submit"  name="submit1"  class="btn btn-success" id="senddata" value="change" style="text-align:center; ">
 
</form>

</div>

<div class="post">

  <form action="account_setting.php" method="post">
  <p>Course Info</p>

  <input type="text" name="sem"  id="sem" size="50" placeholder="semester" style="text-align: center;"> <br/><br/>
    <input type="text" name="dept"  id="dept" size="50" placeholder="department" style="text-align: center;"> <br/><br/>

    <input type="submit"  name="submit2"  class="btn btn-success" id="senddata" value="update" style="text-align:center; ">
  </form>
  
</div>
<div style="text-align:center; "><a  href="./profile.php"  class="btn btn-success" >BACK</a></div>


</div>


</body>
</html>


<?php //echo "$profile_pic";
//echo "$user";



if($user)
{
  
}
else
{
  die("you must be logeed in");
}
if(isset($_POST['submit'])){
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$textarea=$_POST['aboutyou'];



  $update = "UPDATE users SET first_name='$fn', last_name='$ln',bio='$textarea' WHERE username='$user'";
if(mysqli_query($conn,$update)){

           echo "<script type='text/javascript'>\n";
                            echo "alert('profile sucessfully updated');\n";
                             echo "</script>";
}else{

          echo "<script type='text/javascript'>\n";
                            echo "alert('sorry try again....');\n";
                             echo "</script>";
}

}
?>
<?php 

if(isset($_POST['submit1'])){
$pass=$_POST['pass'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];
      
        $pass = md5($pass);
        $npass = md5($npass);
        $cpass = md5($cpass);
        $count=0;
        $u_check = mysqli_query($conn,"SELECT * FROM users WHERE password='$pass'");
// Count the amount of rows where username = $un
        $count = mysqli_num_rows($u_check);
    if($count==1){

      if($npass==$cpass){

         $update1 = "UPDATE users SET password='$npass'WHERE username='$user'and password='$pass'";
if(mysqli_query($conn,$update1)){


            if ($update1) {
              

               echo "<script type='text/javascript'>\n";
                            echo "alert('password sucessfully updated');\n";
                             echo "</script>";
}else{
          

          echo "<script type='text/javascript'>\n";
                            echo "alert('sorry try again....');\n";
                             echo "</script>";
            }



      }



    }else{

        echo "<script type='text/javascript'>\n";
                            echo "alert('password did not match...');\n";
                             echo "</script>";
    }
  }

}
  ?>
  <?php 

  if(isset($_POST['submit2'])){
$sem=$_POST['sem'];
$dept=$_POST['dept'];




  $update = "UPDATE users SET semster='$sem', department='$dept' WHERE username='$user'";
if(mysqli_query($conn,$update)){

           echo "<script type='text/javascript'>\n";
                            echo "alert('course details sucessfully updated');\n";
                             echo "</script>";
}else{

          echo "<script type='text/javascript'>\n";
                            echo "alert('sorry try again....');\n";
                             echo "</script>";
}

}