<?php
   // echo "eshan";
   include_once "../database/env.php";
   session_start();
  
   $food_image=$_FILES["food_img"];
   $title=$_REQUEST["title"];
   $category=$_REQUEST["category"];
   $details=$_REQUEST["details"];
   $price=$_REQUEST["price"];
   $extension = pathinfo($food_image['name'])['extension'] ?? null;

   $acceptedTypes=['jpeg','jpg','png'];
//errors
$errors=[];
   //image validation
  // echo "<pre>";
  // print_r($food_image);
 //  echo "</pre>";
 if($food_image['size'] == 0){
    $errors["food_img"]="select an image!";
 }elseif(!in_array($extension,$acceptedTypes)){
    $errors["food_img"]="select an image with an extension of jpg,png,jpeg!";
 }
/*
 echo "<pre>";
   print_r($errors);
   echo "</pre>";
   */
  //if no errors found
  if(count($errors)>0){
    $_SESSION["errors"]=$errors; header("location: ../bacKend/addfoods.php");
  }else{
    //server image upload processing!
    $path="../uploads/foods";
    if(!file_exists($path)){
        mkdir($path);
    }
    //image name!
    $image_name="menu-" . uniqid() . ".$extension";
    //echo $image_name;
    $upload=move_uploaded_file($food_image["tmp_name"],"$path/$image_name");
    if($upload){
        $query="INSERT INTO foods(category, title, detail, price, food_image) VALUES ('$category','$title','$details','$price','$image_name')";
        $res=mysqli_query($conn,$query);
        $res && header("location: ../bacKend/allfoods.php");
    }
  }
?>