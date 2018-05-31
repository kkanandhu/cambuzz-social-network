<?php 
include("./grill.php");
echo"yyyy";
if(isset($_GET['id'])) {
	$txt= mysqli_real_escape_string($conn,$_GET['id']);

	$user=$username;

$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = "$username";
$user_posted_to = "test123";



$sqlCommand = "INSERT INTO comment(body,date_added,added_by,user_posted_to,pid)  VALUES ('$post','$date_added','$added_by','$user_posted_to','$txt')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 

}
else
{


echo "Enter something";
}
}
?>
<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>grill</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">



<header   >
<script type="text/javascript" src="./js/ajax.js"></script>


</head>

<body style="background-color: white;">

<div class="container" style="margin-top: 5%">


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




  <div class="col col-lg-9"  style="background-color: #F5F5F5">
   


<div class="postForm" style="height: 100px;padding-top: 10px; " >
	
	<form  method="POST" action=""  >

			<div class="container">
			  <div class="row">
			   
			    <div class="col col-md-10" style="height: 100%">
			    <textarea id="post" name="post" rows="2" cols="60" style="height: 100%; background-color:white;"     ></textarea>
			    </div>
			    
			    <div class="col col-md-2" style="height: 100% ;width: 100%;" >
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

$getposts = mysqli_query($conn,"SELECT * FROM comment WHERE pid='$txt' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysqli_fetch_assoc($getposts)) {


						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  

	echo "
                         <div style='background-color:#E3F2FD;'>
                                                
                                              
						  <div class='posted_by'style='background-color:#E3F2FD;'>
                        Posted by:
                                                <a href='$added_by'>$added_by</a> on $date_added</div>
                                                <br />
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
    </body>
    </html>