<?php 
//include("./db.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cambuz";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname );

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
	
	}

 if(isset($_POST['submit'])) { 

//function Forget_password() { 

                $userName = $_POST['user'];
              //  $Regno=$_POST['Regno'];
                $email = $_POST['email'];

                $count=0;
                 $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$userName' AND  email='$email' "); 
                  $count=mysqli_num_rows($query);
                  if( $count==1){

                    $fpass=rand(10000,99999);
              		$p=$fpass;	
                    //echo $fpass;
                    $fpass=md5($fpass);

              $query2= mysqli_query($conn,"UPDATE users
              SET password='$fpass'
              WHERE  username = '$userName' AND  email='$email' ") ;

               echo "<script type='text/javascript'>\n";
                    echo "alert(' $p');\n";
                    echo "</script>";


           //  $subject = "NEW PASSWORD";
            // $message = " new password and userName is
            // username= $userName ,PASSWORD=$fpass";
             //$headers = 'From: <anandhukk67@gmail.com>' . "\r\n";
                
           //  mail($email, $subject, $message,$headers);

            }else{


                    echo "<script type='text/javascript'>\n";
                    echo "alert(' provide exact details ');\n";
                    echo "</script>";


            }

        //}


      
  //  if(isset($_POST['submit'])) { 

                           //  Forget_password(); 
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
    <link rel="stylesheet" type="text/css" href="./login.css">
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

</head>

<body style="background-color: #EEEEEE">


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





<header>


</header>

<main>

<div class="cover"></div>

<form method="POST" action="">
<div class="signupdiv" style="  ;border-radius: 5px;">
        <style>
            .signupdiv {
                background-color:white;
                position: absolute;
                margin: -100px 0 0 -200px;
                top: 20%;
                left: 50%;
                margin-left: 100px;
                }
        </style>








<!--Form without header-->
    <div class="card" style="width: 400px; height: 100%; box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19) ">
    <div class="card-block">

        <!--Header-->
        <div class="text-center">
            <h3><i></i>Forget your password !!!!</h3>
            <hr class="mt-2 mb-2">
        </div>

        <!--Body-->
        <p>Provide us your exact details    </p>
        <br>

        <!--Body-->
        <div class="md-form">
            <i ></i>
            <input type="text" id="form3" class="form-control" name="user" >
            <label for="form3">User name</label>
        </div>

        <div class="md-form">
            <i ></i>
            <input type="email" id="form3" class="form-control" name="email" >
            <label for="form3">your email</label>
        </div>

	
       <!--  <div class="md-form">
            <i ></i>
            <input type="text" id="form2" class="form-control" name="Regno" >
            <label for="form2">College Register number</label>
        </div>-->



         




        <div class="text-center">
            <a href="http://localhost/ss/index.php"  >Back</a>
           <input type="submit" name="submit" class="btn btn-success" value="submit">

        </div>

    </div>
</div>
<!--/Form without header-->


</form>
</main>

<footer>

</footer>




























</body>

</html>




