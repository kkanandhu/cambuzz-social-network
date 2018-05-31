<?php 
include("./grill.php");

if(isset($_GET['id'])) {

	$txt= mysqli_real_escape_string($conn,$_GET['id']);

	$user=$username;
$count=0;
$getlikes = mysqli_query($conn,"SELECT * FROM likes  where pid='$txt' AND like_by='$user'") or die(mysql_error());
	$row = mysqli_fetch_assoc($getlikes);
	$lid= $row['id'];
	$pid=$row['pid'];
	$like_by=$row['like_by'];


	if($pid==$txt&&$like_by==$user){

		$query2=mysqli_query($conn,"DELETE FROM likes WHERE pid='$txt' AND like_by='$like_by'");
		$like =mysqli_query($conn,"SELECT * FROM likes  where pid='$txt'") or die(mysql_error()) ;
		$count = mysqli_num_rows($like );
		$query1=mysqli_query($conn,"UPDATE posts SET like1='$count' WHERE id='$txt'");


		header("location:wall.php");

	}else{

		$sqlCommand ="INSERT INTO likes(pid,like_by)values('$txt','$user')";        
		$query = mysqli_query($conn,$sqlCommand);
		$like =mysqli_query($conn,"SELECT * FROM likes  where pid='$txt'") or die(mysql_error()) ;
		$count = mysqli_num_rows($like );
		$query1=mysqli_query($conn,"UPDATE posts SET like1='$count' WHERE id='$txt'");

		
		header("location:wall.php");

	}



}


		




?> 