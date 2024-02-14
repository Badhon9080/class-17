<?php
      include_once "../database/env.php";
     $category_title = $_REQUEST["category_title"];
       
     //validation

     //validation end
     //data insert
     $query = "INSERT INTO categories(category_title) VALUES ('$category_title')";
     $res= mysqli_query($conn,$query);
     if($res){
           header("location: ../bacKend/categories.php");
     }
?>