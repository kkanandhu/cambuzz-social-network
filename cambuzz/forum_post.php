<?php 
include("./db.php");
include("./grill.php");

/*

$post ="g" ;
if ($post != "") {
*/


$post = $_POST['feed'];
$date_added = date("Y-m-d");
$added_by = $user;
$user_posted_to = "test123";
echo "$post";


$sqlCommand = "INSERT INTO forum_posts(body,date_added,added_by,user_posted_to)  VALUES ('$post','$date_added','$added_by','$user_posted_to')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 
/*
}
else
{


echo "Enter something";
}



*/
?>
