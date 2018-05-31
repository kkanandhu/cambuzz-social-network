



<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">






















</head>

<body style="background-color: white;">


    <!-- /Start your project here-->
    <!-- SCRIPT S -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

<header   >
<script type="text/javascript" src="./js/ajax.js"></script>

<nav class="navbar navbar-toggleable-md fixed-top " style="background-color:#00B0FF;height: 70px;">

    <div class="container">
                        <!-- Nav tabs -->
            <ul class="nav  md-pills pills-ins" role="tablist" style="    width: 50%; margin: 0 auto; ">
                <li class="nav-item">
                <a  id="ab" class="nav-link active  waves-effect waves-light  " data-toggle="tab" href="#panel11" role="tab" style="color: white; "  >
                <img src="./img/home (1).svg" style="width: 20px;height: 20px;"><strong> Home</strong>
                </a>
                <li class="nav-item">
                <a class="nav-link   waves-effect waves-light" data-toggle="tab" href="#panel12" role="tab" style="color: white;" >
                <img src="./img/male.svg" style="width: 20px;height: 20px;"><strong> Profile</strong>
                </a>
                <li class="nav-item">
                <a class="nav-link   waves-effect waves-light" data-toggle="tab" href="#panel13" role="tab" style="color: white;" >
                <img src="./img/net.svg" style="width: 20px;height: 20px;"><strong> Wall</strong>
                </a>
                </li>

               
              


                <li class="nav-item">
                <a class="nav-link   waves-effect waves-light" data-toggle="tab" href="#panel14" role="tab" style="color: white;" >
                <img src="./img/notification.svg" style="width: 20px;height: 20px;"><strong> Dynamic</strong>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link   waves-effect waves-light" data-toggle="tab" href="#panel15" role="tab" style="color: white;" >
                <img src="./img/question.svg" style="width: 20px;height: 20px;"><strong> Forums</strong>
                </a>
                </li>
            </ul>


        
      
    </div>
</nav>

</header>




<main >

 <div class="tab-content card">
    <!--Panel 1-->
    <div class="tab-pane fade in " id="panel11" role="tabpanel" style="height: 0px;">
    <?php 
include("./home.php");
?>
    </div>
    <!--/.Panel 1-->
    <!--Panel 2-->
    <div class="tab-pane  fade in show active " id="panel12" role="tabpanel" style="height: 0px;">
        <br>
    <?php 
include("./profile.php");
?>

    </div>
    <!--/.Panel 2-->
    <!--Panel 3-->
    <div class="tab-pane fade in " id="panel13" role="tabpanel" >

    </div>
   






                    </div> 
                
                    </div>








    </div>
    <!--/.Panel 3-->
</div>

</main>
<footer>
</footer>




























</body>

</html>
