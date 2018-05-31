<?php //include("./db.php");

//$user="root";
//include("./profile.php");
  if (!empty($_REQUEST['term'])) {
  //$check_pic = mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user'");
  //$get_pic_row = mysqli_fetch_assoc($check_pic);
 
  //$profile_pic_db = $get_pic_row['profile_pic'];
  //echo  $profile_pic_db;


  //if ($profile_pic_db == "") {
  //$profile_pic = "./img/default_pic.png";
 // }
 // else
 // {
 // $profile_pic = "./userdata/profile_pics/".$profile_pic_db;
 // }

 $term = mysqli_real_escape_string($conn,$_REQUEST['term']);
$sql = "SELECT * FROM users WHERE first_name LIKE '%".$term."%' or last_name LIKE '%".$term."%'"; 
$r_query = mysqli_query($conn,$sql) or die(mysqli_error());
while ($row = mysqli_fetch_assoc($r_query)) {
          $profile_pic_db = $row['profile_pic'];
          $profile_pic = "./userdata/profile_pics/".$profile_pic_db;
            $id = $row['id'];
            $first_name = $row['first_name']; 
            $last_name = $row['last_name'];
            //$profile_pic = $row['profile_pic'];
             echo "<div id='output' class='form-group'><a href='./view.php?id=$id'> 
     <img src='$profile_pic' class='dpic' />
    </a> <a href='./view.php?id=$id'> <b> $first_name $last_name  </b></a> <p></div>";
              



}
}

?>