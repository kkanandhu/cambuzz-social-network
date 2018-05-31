
<?php 

//include("./log.php");
include("./head.php");
$username = $_SESSION['user_login'];
$user=$username;

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













<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary fixed-top">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <strong></strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item ">
                    <img src="img/svg/logo.png" height="50px" width="80px"> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link show active" href="./home.php">   Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active  waves-effect waves-light" href="./profile.php" >profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active  waves-effect waves-light" href="./wall.php">wall</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active  waves-effect waves-light" href="./dynamic.php" >dynamic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active  waves-effect waves-light" href="./forum.php" >forum</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link active  waves-effect waves-light" href="./logout.php" >logout</a>
                </li>
                 
                <!--<li class="nav-item dropdown btn-group">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item">Action</a>
                        <a class="dropdown-item">Another action</a>
                        <a class="dropdown-item">Something else here</a>
                    </div>
                </li>-->
            </ul>
            <img src="./img/search1.png" width="25px" height="25px" ><span>
            <form action="search.php" method="post">  <input type="text" name="term" />

 
</form> </span>
           <!-- <form class="form-inline waves-effect waves-light" method="POST">
                <input class="form-control" type="text" name="search" placeholder="Search">
                <?php //header("location:./search.php");  ?>
            </form>-->
        </div>
    </div>
</nav>


                            
                            
                           
</body>

</html>
