


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Search</title>
  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
    
    #output {
 display: inherit;
 height: 80px; 
 color: #000; 
 font-size: 19px;
 margin: 0;
 border-top: 1px dotted #ddd;
 background-color: #d7fbf0; 
 /*background: transparent;*/
 border-color: #000000;

} 
.dpic{

  height: 58px;
  width:58px;

}
</style>



</head>



<body>
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






<!--<header   >
<script type="text/javascript" src="./js/ajax.js"></script>

<nav class="navbar navbar-toggleable-md fixed-top " style="background-color:#00B0FF;height: 70px;">

    <div class="container">
                      
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
    <form action="search.php" method="post"> 
Search: <input type="text" name="term" />
<input type="submit" value="Submit" /> 
</form> 

</nav>

</header>-->





<main >



<div class="container">

        <div class="row" style="margin-top: 100px">
           
                      <div style="height: 300px;width: 400px;">
                          

                          





                      </div>
                      <div style="height: 300px;width: 700px;">
                          

                          <h1 style="font-family: arial;color: #212121"><strong>Search Results</strong></h1>
                          <div style="font-family: arial">
                            
                            <?php include("./results.php"); ?>


                          </div>






















                      </div>
                  
                     







        

        </div>




















</div>


</main>







</body>
</html>
















