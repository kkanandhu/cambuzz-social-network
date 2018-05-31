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
		echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
		
		$profile_pic_name = @$_FILES["profilepic"]["name"];
		$profile_pic_query = mysqli_query($conn,"UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");

		header("Location: grill.php");

     echo "<script type='text/javascript'>\n";
                    echo "alert(' profilepic updated sucessfully..');\n";
                    echo "</script>";

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





    <style >
        .cover {

  position:absolute;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  width: auto;
  height: auto;
 /* background-image: url("./img/images.jpg");*/
 opacity: 20%;
  
  overflow-y: auto;
  
}
.page{
  position: relative;
  
}
    </style>
</head>
<body>
<CENTER>
<div class="cover">
<DIV class="page">
<h2>EDIT YOUR PROFILE</h2>
<hr>
<p>UPLOAD PROFILE PIC</p>
<form method="POST" enctype="multipart/form-data">
<img src="<?php echo "$profile_pic";?>" style="width: 150px;height: 150px;"><br  />
<input type="file" name="profilepic"><br>
 <input type="submit" name="uploadpic"  value="upload">
	
</form>
<hr>
<form action="account_setting.php" method="post">
<p>UPDATE PROFILE INFO</p>
<input type="text" name="fname"  id="fname" size="50" placeholder="Firstname" style="text-align:center; "> <br   /><br   />
<input type="text" name="lname"  id="lname" size="50" placeholder="Lastname" style="text-align:center; "><br   /><br   />
<textarea name="aboutyou" id="aboutyou" rows="6" cols="50" placeholder="your skills" style="text-align:center; "></textarea>
<hr>
<input type="submit"  name="submit"  class="btn btn-success" id="senddata" value="update">
 
</form>



<form action="account_setting.php" method="post">
<p>CHANGE PASSWORD</p>
<input type="password" name="pass"  id="pass" size="50" placeholder="old password" style="text-align:center; "> <br   /><br   />
<input type="password" name="npass"  id="npass" size="50" placeholder="new password" style="text-align:center; "><br   /><br   />
<input type="password" name="cpass" id="cpass" size="50"  placeholder="confirm password" style="text-align:center; ">
<hr>
<input type="submit"  name="submit1"  class="btn btn-success" id="senddata" value="change" style="text-align:center; ">
 <a  href="./profile.php"  class="btn btn-success"  >back</a>
</form>

</DIV>
</div>
</div>
</CENTER>
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