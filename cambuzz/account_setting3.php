<?php 

include("./db.php");
//$user= $_SESSION["user_login"];
$user="root"
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
  $profile_pic = "kk/profile_pics/".$profile_pic_db;
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

		}










   	}
   	else
   	{
 
   			echo "IMAGE INVALID FORMAT";

   	}





  }



?>
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
<input type="text" name="fname"  id="fname" size="50" placeholder="Firstname"> <br   /><br   />
<input type="text" name="lname"  id="lname" size="50" placeholder="Lastname"><br   /><br   />
<textarea name="aboutyou" id="aboutyou" rows="6" cols="50" placeholder="your skills"></textarea>
<hr>
<input type="submit" name="senddata" id="senddata" value="update">

</form>
<?php echo "$profile_pic";?>