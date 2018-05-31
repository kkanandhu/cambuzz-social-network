<?php 
include("./grill.php");

$user=$username;

$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = "$username";
$user_posted_to = "test123";



$sqlCommand = "INSERT INTO posts(body,date_added,added_by,user_posted_to,like1)  VALUES ('$post','$date_added','$added_by','$user_posted_to',0)";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 

}
else
{


echo "Enter something";
}













//Check whether the user has uploaded a profile pic or not
  $check_pic = mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user'");
  $get_pic_row = mysqli_fetch_assoc($check_pic);
 
  $profile_pic_db = $get_pic_row['profile_pic'];
  echo  $profile_pic_db;


  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  }


 $data1 = mysqli_query($conn,"SELECT * FROM users WHERE username='$user'");
  while ($row = mysqli_fetch_assoc($data1)){


  	      $fn=$row['first_name'];
  	      $ln=$row['last_name'];
  	      $email=$row['email'];
  	      $bio=$row['bio'];
           $sem=$row['semster'];
            $dept=$row['department'];
  }




?>




<p id="demo"></p>


<script>

$('input#name').on('click',function()
{

 
	var postdata = $('input#t1').val();

  //if($.trim(name) !='') {
    $.post('send_post.php',{postdata:postdata},function(data){

    	alert(data);


    });
}
});




</script>




<div class="profilePosts">








</div>

<div class="container" style="margin-top: 5%;">
  <div class="row">
   
    <div class="col col-lg-3" style="background-color: #FAFAFA;">
    


<!--Card-->
<div class="card">

    <!--Card image-->
    <img class="img-fluid" src="<?php echo "$profile_pic";?>" style="width: 100%;height: 250px;">
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-block">
        <!--Title-->
        <h4 class="card-title"><?php echo $fn;  ?><span>     <?php echo $ln;?></span></h4>
    
    </div>
    <!--/.Card content-->

</div>
<!--/.Card-->

<br/><a href="account_setting.php"><strong>EDIT PROFILE</strong></a><br/><br/>
<!--<a href="logout.php"><strong>LOGOUT</strong></a><br/><br/>-->


 


                            
                          <h3 class="title" style="font-size: 20px;">NAME</h3>
                                <p style="padding-left:10px;"> <?php echo $fn ;?> <span><?php echo $ln ;?></span></p>
                                
                          <h2 class="title" style="font-size: 20px;">EMAIL</h2>
                                    <p style="padding-left:10px;"> <?php echo $email ;?> </p>
                          <h3 class="title" style="font-size: 20px;">SKILS (about)</h3>
                                    <p style="padding-left:10px;"> <?php echo $bio ;?> </p>
                          <h2 class="title" style="font-size: 20px;">SEMSTER</h2>
                                    <p style="padding-left:10px;"> <?php echo $sem ;?> </p>
                          <h2 class="title" style="font-size: 20px;">DEPARTMENT</h2>
                                    <p style="padding-left:10px;"> <?php echo $dept ;?> </p><br/><br/>














    </div>
    
    <div class="col col-lg-9"  style="background-color: #BBDEFB">
   


<div class="postForm" style="height: 120px; " >
	
	<form  method="POST" action=""  >

			<div class="container">
			  <div class="row">
			   
			    <div class="col col-md-10" style="height:100%;padding-top:10px;">
			    <textarea id="post" name="post" rows="3" cols="60" style="height: 100%;background-color:white; "     ></textarea>
			    </div>
			    
			    <div class="col col-md-2" style="height: 100%" >
			     <input type="submit" name="submit1"  class="btn btn-success" value="post"       style="width: 100%;padding-top: 10px;"      >
			    </div>
	
			  </div>
			</div>






	<div>

	
	



	</div>







               </form>

</div>



<div style="background-color: white;width: 100%">
	
<?php 

$getposts = mysqli_query($conn,"SELECT * FROM posts WHERE added_by='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysqli_fetch_assoc($getposts)) {


						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  

	echo "
                                                <div style='background-color:#E3F2FD;'
'>
                                                
                                                
						<div class='posted_by'style='background-color:#E3F2FD;'>
						Posted by:
                                                <a href='$added_by'>$added_by</a> on $date_added</div>
                                                <br /><br />
                                                <div  style='max-width: 600px;background-color:#E3F2FD;'>
                                                $body<br /><p /><p />
                                                </div>
                                                </div>
                                                </hr>
                                                
						";











	}


 ?>



</div>










    </div>
    
   
    
  </div>
</div>