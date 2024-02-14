<!--   header("location: ../bacKend/allfoods.php"); -->
<?php
   session_start();
  //  echo "yes/no";
  include "../database/env.php";
  $id = $_REQUEST["id"];
  $query= "DELETE FROM foods WHERE id = '$id'";
  $res=mysqli_query($conn,$query);
  if($res){ header("location: ../bacKend/allfoods.php");
}
?>