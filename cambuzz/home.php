<?php 

include("./grill.php");

echo "$user";
$id=1;
$getposts = mysqli_query($conn,"SELECT activated FROM users WHERE username='$user' ORDER BY id DESC LIMIT 10") or die(mysql_error());

    while ($row = mysqli_fetch_assoc($getposts)) {

                        
                        $id = $row['activated'];
                        echo "$id";

            }            


if($user)
{
    
}
else
{
    die("you must be logeed in");
}
if($id==1){
if (isset($_POST['uplodpic'])) {     //&& $id==1

$post = $_POST['body1'];
	$date_added = date("Y-m-d");
$added_by = "$user";
$user_posted_to = "test123";

//profile image upload
  if (isset($_FILES['profilepic'])) {
   if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576)) //1 Megabyte
   	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$rand_dir_name = substr(str_shuffle($chars), 0, 15);
		mkdir("userdata/profile/$rand_dir_name");


		if (file_exists("userdata/profile/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
		{
		echo @$_FILES["profilepic"]["name"]." Already exists";
		}
		else
		{
		move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile/$rand_dir_name/".$_FILES["profilepic"]["name"]);
		//echo "Uploaded and stored in: userdata/profile/$rand_dir_name/".@$_FILES["profilepic"]["name"];
		
		$profile_pic_name = @$_FILES["profilepic"]["name"];
		$profile_pic_query = mysqli_query($conn,"INSERT INTO dynamic (username,body,dynamic_pic,date_added,added_by,user_posted_to)VALUES('$user','$post','$rand_dir_name/$profile_pic_name','$date_added','$added_by','$user_posted_to')  ");

		//header("Location: grill.php");

     echo "<script type='text/javascript'>\n";
                    echo "alert(' dynamic_pic uploaded sucessfully..');\n";
                    echo "</script>";

		}










   	}
   	else
   	{
 
   			echo "<script type='text/javascript'>\n";
                    echo "alert(' image invalid format...');\n";
                    echo "</script>";


   	}





  }


 
}//else{
 // echo "<script type='text/javascript'>\n";
  //                  echo "alert('this is only for authorized people...');\n";
  //                  echo "</script>";

//}

//dynamic post

if(isset($_POST['submit'])&&$id==1){

$post = $_POST['post'];

$date_added = date("Y-m-d");
$added_by = "$user";
$user_posted_to = "test123";
echo "$id";


$sqlCommand = "INSERT INTO dynamic( username,body,date_added,added_by,user_posted_to)  VALUES ('$user','$post','$date_added','$added_by','$user_posted_to')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 


 echo "<script type='text/javascript'>\n";
                    echo "alert(' dynamic post uploaded sucessfully..');\n";
                    echo "</script>";


}//else{
  // echo "<script type='text/javascript'>\n";
    //                echo "alert('this is only for authorized people...');\n";
         //           echo "</script>";


//}
}else{
  echo "<script type='text/javascript'>\n";
                    echo "alert('this is only for authorized people...');\n";
                   echo "</script>";


}



?>



<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>home</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">



     <style >
        .cover {

  position: absolute;
  top: -20px;
  left: -20px;
  right: -40px;
  bottom: -40px;
  width: auto;
  height: auto;
  background-image: url("./img/1.jpg");
  background-size: cover;
  -webkit-filter: blur(5px);
  z-index: 0;
    </style>



<header   >
<script type="text/javascript" src="./js/ajax.js"></script>


</head>

<body style="background-color: white;" class="#eeeeee grey lighten-3">




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
<div class="cover"></div>

<div class="container z-depth-1" style="margin-top: 15%;background-color: white;">
  <div class="row" >
   
   
    
    <div class=" col-md-8" >

<hr>


<p>UPLOAD DYNAMIC PIC</p>
<form method="POST" enctype="multipart/form-data">
<!--<img src="<?php //echo "$profile_pic";?>" style="width: 150px;height: 150px;"><br  />-->
<input type="file" name="profilepic" class="btn btn-success"><br/>
<input type="text" name="body1" placeholder="pic_descreption" style="width: 325px;"><br/>
 <input type="submit" name="uplodpic"  class="btn btn-success" value="upload">
  
</form>

 



      
    </div>
    
    <div class=" col-md-4" style="" >
    <div style="margin-bottom: 10px;" >
<form action="" method="POST">
<textarea type="text" id="textarea1" name="post" class="md-textarea" length="120" placeholder="POST SOMETHING TO DYNAMIC"></textarea>
<label for="textarea1"></label>
 <input type="submit" name="submit"   value="post"  class="btn btn-success"     style="width: 100%;padding-top: 10px;"      >

 </form>
    </div>
    </div>
    
  </div>
</div>






</body>

</html>
