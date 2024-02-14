<?php
    session_start();
   include "../database/env.php";
   /*
    food_img;
    hidden_id;
    title;
    detail;
    price;
    update_btn
 */
  $update_id=$_REQUEST['hidden_id'];
 
 // echo "<pre>";
 //   print_r($food_img);
 //   echo "</pre>";
  
  // echo $update_id;
if(isset($_REQUEST['update_btn'])){
    $food_img =  $_FILES['food_img'];
    $category = $_REQUEST['category'];
  $title = $_REQUEST['title'];
  $details = $_REQUEST['details'];
  $price = $_REQUEST['price'];$tmp_name=$food_img['tmp_name'];
  $uniq_name= "food-image" .uniqid(). $food_img['name']; 
   move_uploaded_file($tmp_name, '../uploads/foods/'.$uniq_name);

/*
  if($food_img('size') > 0){
     $update_query = "UPDATE foods SET category='$category',
     title='$title',detail='$details',price='$price',
     food_image='$uniq_name' WHERE id = $update_id";
     $is_update = mysqli_query($conn,$update_query);
  }else{
    $update_query = "UPDATE foods SET category='$category',
     title='$title',detail='$details',price='$price'
     WHERE id = $update_id";
     $is_update = mysqli_query($conn,$update_query);
  }
  */
 // echo "<pre>";
 // print_r($food_img);
  // echo "</pre>";
  $update_query = "UPDATE foods SET category='$category',
  title='$title',detail='$details',price='$price',
  food_image='$uniq_name' WHERE id = $update_id";
  $is_update = mysqli_query($conn,$update_query);
 //$is_update = mysqli_query($conn,$update_query);
 if($is_update){
    header("location: ../bacKend/allfoods.php");
 }
}
?>