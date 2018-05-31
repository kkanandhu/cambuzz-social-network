<?php 
include("./db.php");


/*

$post ="g" ;
if ($post != "") {
*/


$post = "india is my country all indians are my brothers and sisiters";
$date_added = date("Y-m-d");
$added_by = "gokul";
$user_posted_to = "test123";
echo "$post";


$sqlCommand = "INSERT INTO posts(body,date_added,added_by,user_posted_to)  VALUES ('$post','$date_added','$added_by','$user_posted_to')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 
/*
}
else
{


echo "Enter something";
}



*/
?>
