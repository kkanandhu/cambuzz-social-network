<?php 
include("./grill.php");
$fn="";
$ln="";
$email="";
$bio="";
$fn = isset($_POST['fn']) ? $_POST['fn'] : '';
$fn = !empty($_POST['fn']) ? $_POST['fn'] : '';
$ln = isset($_POST['ln']) ? $_POST['ln'] : '';
$ln = !empty($_POST['ln']) ? $_POST['ln'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$email = !empty($_POST['email']) ? $_POST['email'] : '';
$bio = isset($_POST['bio']) ? $_POST['bio'] : '';
$bio = !empty($_POST['bio']) ? $_POST['bio'] : '';

//Check whether the user has uploaded a profile pic or not

if(isset($_GET['id'])) {
	$txt= mysqli_real_escape_string($conn,$_GET['id']);
  $check_pic = mysqli_query($conn,"SELECT profile_pic FROM users WHERE id='$txt'");
  $get_pic_row = mysqli_fetch_assoc($check_pic);
 
  $profile_pic_db = $get_pic_row['profile_pic'];
  
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
 


 $data1 = mysqli_query($conn,"SELECT * FROM users WHERE id='$txt'");


			$row = mysqli_fetch_assoc($data1);
  	      $fn=$row['first_name'];
  	      $ln=$row['last_name'];
  	      $email=$row['email'];
  	      $bio=$row['bio'];
  	     
}



?>

<div class="container" style="margin-top: 5%;">
  <div class="row">
   
    <div class="col col-lg-3" style="background-color: #FAFAFA;">
    


<!--Card-->
<div class="card">

    <!--Card image-->
    <img class="img-fluid" src="<?php echo "$profile_pic" ;?>" style="width: 100%;height: 250px;">
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-block">
        <!--Title-->
        <h4 class="card-title"><?php echo $fn ;?> <span><?php echo $ln ;?></span></h4>
    
    </div>
    <!--/.Card content-->

</div>
<!--/.Card-->



 


                            
                                   
                            

    </div>
   <div class="col col-lg-9"  style="background-color: #F5F5F5">








 									<h3 class="title" style="font-size: 20px;">NAME</h3>
                                    <p> <?php echo $fn ;?> <span><?php echo $ln ;?></span></p>
                                
                              		<h2 class="title" style="font-size: 20px;">EMAIL</h2>
                                    <p> <?php echo $email ;?> </p>
                                    <h3 class="title" style="font-size: 20px;">SKILLS (about)</h3>
                                    <p> <?php echo $bio ;?> </p>


</div>
</div>
</div>


