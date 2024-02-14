<?php
     session_start();
     include "../../database/env.php";
      $title=$_REQUEST["title"];
      $details=$_REQUEST["details"];
      $btn_title=$_REQUEST["btn_title"];
      $btn_link=$_REQUEST["btn_link"];
      $video_url=$_REQUEST["video_url"];
      $store_btn=$_REQUEST["store_btn"];
      $featured_img=$_FILES["featured_img"];

      if(isset($store_btn)){

     /*   echo "<pre>";
        print_r($featured_img);
        echo "</pre>";*/
      

      $imagePath =uniqid() .  'banner-image' . $featured_img['name'];
      $tmp_name =$featured_img['tmp_name'];

      move_uploaded_file($tmp_name, 'uploads/'. $imagePath);

      // echo $imagePath;
         $query="INSERT INTO banners(heading, details, button_title, button_url, video_url, featured_img) VALUES ('$title','$details','$btn_title','$btn_link','$video_url','$imagePath')";
            mysqli_query($conn,$query);
            $_SESSION["success"]= "store inserted!";
            header("location: ../../bacKend/allbanner.php");
      }
?>