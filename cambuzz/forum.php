<?php

include("./grill.php");
//include("./head.php");
//$username = $_SESSION['user_login'];



 //include("./db.php");
//$user="root";
//include("./profile.php");
  $check_pic = mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user'");
  $get_pic_row = mysqli_fetch_assoc($check_pic);
 
  $profile_pic_db = $get_pic_row['profile_pic'];
  //echo  $profile_pic_db;


  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  }









?>





<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>forum</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!--<link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">-->
      <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
      <script>
        $(document).on('click','#button',function(){
          var feed = $('#feedbox').val();
          if(!feed)
            alert('enter the field');
          else{
           $( '<div id="feed"> <div class="row">\
          <div class="col-md-2"><img src="<?php echo "$profile_pic";?>" class="img-fluid rounded-circle z-depth-2"  style="height:80px;width:80px;" /></div>\
         <div class="col-md-10">\
           <div><b> <?php echo "$user";?></b>\
           <div class="pull-right text-muted" id="delete"><small>delete</small></div></div><br>\
           <div>'+feed+'</div>\
           <div class="text-muted"><small><?php  echo date('Y-m-d H:i:s'); ?></small></div>\
         </div>\
      </div><hr></div>').insertAfter("#insert").hide().slideDown();
           $('#feedbox').val(" ");

            $.post('forum_post.php',{feed:feed},function(){


    });
         }
        });
   $(document).on('click','#delete',function(){

        $(this).closest('#feed').slideUp();
       })
      </script>

</head>
<style>
    #delete{
        cursor: pointer;
    }

</style>

<body>


 <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>





<header>
<script type="text/javascript"   src="script.js"></script>

               







                 
        </div>
    </div>
</nav>

</header>


    <div class="container" style="padding-left: 150px;">
      <div class="header clearfix">
        <h3 class="text-muted">Forums</h3>
      </div>

    <div style="margin-top: 50px;">
      <div class="row">
          <div class="col-md-2"><img src="<?php echo "$profile_pic";?>" class='img-fluid rounded-circle z-depth-2'  style='height:80px;width:80px;' /></div>
         <div class="col-md-10"><textarea class="form-control" id="feedbox" rows="3" width="100%"></textarea><br>
         <button type="button" id="button" class="btn btn-default"><font color="red">post</font></button>
         <p style="text-align: right;" class="btn btn-default"><a href="./replay.php"><b>View Posts</b></a></p>
         </div>
      </div>
    </div>
     <hr>
     <div id="insert"></div>
      <div>
      <!--  <div class="row" id="feed">
          <div class="col-md-2"><img src="<?php echo "$profile_pic";?>" class='img-fluid rounded-circle z-depth-2'  style='height:80px;width:80px;' class="img-circle" width="100%" /></div>
       <div class="col-md-10">
           <div><b> <?php echo"$user" ?></b>
           <div class="pull-right text-muted" id="delete"><small>delete</small></div></div><br>
           <div>Campus Diaries is a network of people you know, colleges you study in, and people around you who share similar backgrounds. It has a strong focus on content. Campus Diaries has, over the course of the last year, built an entire community that accesses it from 300 campuses across the country.</div>
           <div class="text-muted"><small>posted 5 minutes ago</small></div>
         </div>
      </div> -->
    </div>

    <!--  <footer class="footer">
        <p>&copy; 2017 Cambuzz</p>
      </footer>

    </div> <!-- /container -->
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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  




  </body>
</html>
