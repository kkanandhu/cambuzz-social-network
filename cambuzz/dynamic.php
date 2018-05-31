


<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>dynamic</title>
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
<!--<<?php 
//include("./grill.php");
 ?>-->

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


<div class="container" style="margin-top: 5%;background-color: white;width: 100%;a">
  <div class="row" style="padding-left: 300px;">
   
   
    
    <div class=" col-md-8" style="background-color: #EEEEEE;width: 100%; " >

<div style="background-color: white;width: 100%;" >
    
<?php
include("./grill.php");
//include("./head.php");
//$username = $_SESSION['user_login'];

//include("./db.php");
//$user= $_SESSION["user_login"];
$username=$user;
$getposts = mysqli_query($conn,"SELECT * FROM dynamic order by id desc ") or die(mysql_error());
while ($row = mysqli_fetch_assoc($getposts)) {


                        $id = $row['id'];
                        $body = $row['body']; 
                        $profile_pic_db=$row['dynamic_pic'];  
                        $date_added = $row['date_added'];
                        $added_by = $row['added_by'];
                        $user_posted_to = $row['user_posted_to']; 
                        $dynamic_pic = "userdata/profile/".$profile_pic_db;

                       
                                   if($body&&$profile_pic_db)   {





                                     echo "     
                                               <div class='author-box z-depth-1'style=' padding-top:20px;' > 
                                           
                                               
                        <div class='posted_by'>
                                             <p> Posted by:
                                                <a href='$added_by'>$added_by</a> on $date_added</div>
                                                </p>
                                                <div  style='max-width: 600px;'>
                                                <img src=' $dynamic_pic'style='max-width: 600px;padding-top:10px; padding-left:10px;'> <br /><p /><p />
                                                </div>
                                                <div  style='max-width: 600px;padding-left:10px;'>
                                               <p> $body</p> <br /><p />
                                                </div>
                                                </div>
                                                
                                                </hr>
                                                
                        ";





   




                            }elseif(!$body&&$profile_pic_db) {


 echo "                                        <div class='author-box z-depth-1'style=' padding-top:20px;'>
                                                    
                                                <p style='color:grey;'><strong style='color:black;'>$added_by</strong>  on    $date_added    </p>
                                                <div class=' row-md-8' >
                                                <p> <img src='$dynamic_pic'style='max-width: 500px;max-height: 500px;padding-left:10px;'></p><br/><br/>
         
                                                
                                                </div>
                                                </div>
                                                </hr>
                                                
                        ";



                                    }else{

                                         echo "
                                                <div class='author-box z-depth-1' style=' padding-top:20px;' > 
                                           
                                               
                        <div class='posted_by'>
                                             <p> Posted by:
                                                <a href='$added_by'>$added_by</a> on $date_added</div>
                                                </p>
                                                
                                                <div  style='max-width: 600px;padding-left:10px;'>
                                                <p>$body </p><br /><p /><p/>
                                                </div>
                                                </div>
                                                
                                                </hr>
                                                
                        ";
                                    }
                            





    }


 ?>



</div>










    </div>
    
   
    
  </div>
</div>


      
<div id="footer">
    <div class="container">
    <div style="  box-sizing: border-box;
          width: 90%;
          margin: 20px auto;
          padding: 20px 0px;
          text-align: center;
        ">
    <h3>NSS LIFE!</h3>
     <div style="display: inline-block;
          margin: 0px 2% 80px 2%;
         text-align: center;
         width: 45%;">
    <p>&copy; 2017, made with <span class="redheart" style="font-size:300%; color:red">&hearts;</span> by Cambuzz Team </p></div>
    </div>
    </div>
    </div>






</body>

</html>
