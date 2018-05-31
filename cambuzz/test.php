<?php 
include("./head.php");
$username = $_SESSION['user_login'];



$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = "$username";
$user_posted_to = "test123";



$sqlCommand = "INSERT INTO posts(body,date_added,added_by,user_posted_to)  VALUES ('$post','$date_added','$added_by','$user_posted_to')";  
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
  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
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
        <h4 class="card-title">Card title</h4>
    
    </div>
    <!--/.Card content-->

</div>
<!--/.Card-->

<a href="account_setting.php"><strong>EDIT PROFILE</strong></a>















    </div>
    
    <div class="col col-lg-9"  style="background-color: #F5F5F5">
   


<div class="postForm" style="height: 100px; " >
	
	<form  method="POST" action=""  >

			<div class="container">
			  <div class="row">
			   
			    <div class="col col-md-10" style="height: 100%">
			    <textarea id="post" name="post" rows="4" cols="60" style="height: 100%"     ></textarea>
			    </div>
			    
			    <div class="col col-md-2" style="height: 100%" >
			     <input type="submit" name="submit"  class="btn btn-success" value="post"       style="width: 100%;padding-top: 10px;"      >
			    </div>
	
			  </div>
			</div>






	<div>

	
	



	</div>







               </form>

</div>



<div style="background-color: white;width: 100%">
	
<<?php 

$getposts = mysqli_query($conn,"SELECT * FROM posts WHERE added_by='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysqli_fetch_assoc($getposts)) {


						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  

	echo "
                                                <div style='float: left;'>
                                                
                                                </div>
						<div class='posted_by'>
						Posted by:
                                                <a href='$added_by'>$added_by</a> on $date_added</div>
                                                <br /><br />
                                                <div  style='max-width: 600px;'>
                                                $body<br /><p /><p />
                                                </div>
                                                <hr />
						";











	}


 ?>



</div>










    </div>
    
   
    
  </div>
</div>