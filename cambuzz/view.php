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
  //echo  $profile_pic_db;


  //if ($profile_pic_db == "") {
  //$profile_pic = "img/default_pic.jpg";
  //}
  //else
 // {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
 // }


 $data1 = mysqli_query($conn,"SELECT * FROM users WHERE id='$txt'");
  //if (mysqli_num_rows($data)==1){

			$row = mysqli_fetch_assoc($data1);
  	      $fn=$row['first_name'];
  	      $ln=$row['last_name'];
  	      $email=$row['email'];
  	      $bio=$row['bio'];
           $sem=$row['semster'];
            $dept=$row['department'];
  	      //$profile_pic=$row['profile_pic'];

  	     //  }
}



?>

<div class="container" style="margin-top: 10%;">
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
       <!-- <h4 class="card-title">Card title</h4>-->
    
    </div>
    <!--/.Card content-->

</div>
<!--/.Card-->



 


                            
                                   
                            

    </div>
   <div class="col col-lg-9"  style="background-color: #F5F5F5;">








 									<h3 class="title" style="font-size: 20px;"><b>NAME</b></h3>
                                    <p> <?php echo $fn ;?> <span><?php echo $ln ;?></span></p>
                                
                              		<h2 class="title" style="font-size: 20px;"><b>EMAIL</b></h2>
                                    <p> <?php echo $email ;?> </p>
                                    <h3 class="title" style="font-size: 20px;">SKILLS (about)</h3>
                                    <p> <?php echo $bio ;?> </p>
                         <h2 class="title" style="font-size: 20px;">SEMSTER</h2>
                                    <p style="padding-left:10px;"> <?php echo $sem ;?> </p>
                          <h2 class="title" style="font-size: 20px;">DEPARTMENT</h2>
                                    <p style="padding-left:10px;"> <?php echo $dept ;?> </p><br/><br/>



</div>
</div>
</div>


