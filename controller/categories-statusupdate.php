<?php
   include_once "../database/env.php";
   // echo "hi";
   //status == 0 change => 1;
   //status == 1 change => 0;
   $id = $_REQUEST["id"];
   $status= $_REQUEST["status"];


   if($status == false){
            $query="UPDATE categories SET status=true WHERE id = '$id'";
   }elseif($status == true){
    $query="UPDATE categories SET status=false WHERE id = '$id'";
   }
   $res=mysqli_query($conn,$query);
   if($res){
        header("location: ../bacKend/categories.php");
   }
?>