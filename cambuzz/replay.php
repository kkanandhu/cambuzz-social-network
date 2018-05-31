

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


<div class="container" style="margin-top: 5%">
  <div class="row">
   
    <div class=" col-md-2" >
    
    </div>
    
    <div class=" col-md-8" >

<?php 
include("./grill.php");
//include("./head.php");
//$username = $_SESSION['user_login'];



$getposts = mysqli_query($conn,"SELECT * FROM forum_posts  ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysqli_fetch_assoc($getposts)) {

            
            $id = $row['id'];
            $body = $row['body']; 
            $date_added = $row['date_added'];
            $added_by = $row['added_by'];
            $user_posted_to = $row['user_posted_to']; 
            $path= mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$added_by' ") or die(mysql_error()); 
           
            while ($row1 = mysqli_fetch_assoc($path)) {

 $image = $row1['profile_pic'];


      echo "<!--Author box-->
<div class='author-box z-depth-1' >
    <!--Name-->
    <div class='row' style='padding: 20px;''>
        <!--Avatar-->
        <div class='col-12 col-sm-2'>
            <img src='./userdata/profile_pics/$image'class='img-fluid rounded-circle z-depth-2'  style='height:80px;width:80px;'>
        </div>
        <!--Author Data-->
        <div class='col-12 col-sm-10'>
            <p style='color:grey;'><strong style='color:black;'>$added_by</strong>  on    $date_added    </p>
         
            <p>$body</p><br/>
            
         <div style='padding-right: 50px; ' >
            
            

         <a href='./freplay.php?id=$id'><b> REPLY </b></a>
         </div>

         

           
        </div>
    </div>
</div>
<hr>
<!--/.Author box-->
        
                           ";                                      

}
}

?>
<script type="text/javascript">
    // Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Popovers Initialization
$(function () {
  $('[data-toggle="popover"]').popover()
})

</script>





















      
    </div>
    
    <div class=" col-md-2" >
   
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
