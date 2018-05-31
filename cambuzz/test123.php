<?php include("./db.php");

$s=0;
$s=$_POST['name'];
if(isset($_POST['ok'])){

     echo "$s";

}





?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST">
	
	<input type="text" name="name"  >
	<input type="submit" name="ok" value="ok">
</form>


</body>
</html>