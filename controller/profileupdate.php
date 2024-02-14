<?php
    //echo "hi";
    //data collect
    session_start();
    include "../database/env.php";
    $fname=$_REQUEST["fname"];
    $lname=$_REQUEST["lname"];
    $email=$_REQUEST["email"];
    $profileImage=$_FILES["profileImage"];
     $errors=[];
    /*var_dump(pathinfo($profileImage['name']));
    exit();*/
    $extension=null;
    if($profileImage['size'] > 0){
      $extension=pathinfo($profileImage['name'])['extension'];
    }
   // $extension=pathinfo($profileImage['name'])['extension'];
    $acceptedTypes=['jpg','png'];
    $user_id=$_SESSION["auth"]["id"];
   // var_dump($profileImage);
   //google search: how to find a value from an array in php; or in_array in php  || mb to byte || how to create a file in php
  // echo "<pre>";
 //  print_r(in_array($extension,$acceptedTypes));
// var_dump(in_array($extension,$acceptedTypes));
  // print_r($profileImage);
  
 //print_r(pathinfo($profileImage['name'])['extension']);
  //pathinfo($profileImage['name']);
 //  echo "</pre>";
// exit(); 
   //validation
  /*if($profileImage['size'] == 0){
        $errors["profileImage"]= 'please select an image';
  }elseif(!in_array($extension,$acceptedTypes)){
    $errors["profileImage"]= 'please select an image with extension of jpg or png';
  }*/
  //if errors found
  if(count($errors)>0){
    //rediRect bacK
    $_SESSION['errors'] =$errors;
    header("location: ../bacKend/profile.php");
  }else{
    //if no errors found
    //if upload folder not found
        $path ='../uploads';
      //  var_dump( file_exists($path ));
      //  mkdir($path);
      if(!file_exists($path)){
        mkdir($path);
      }
      //file upload
     // $filename=null;
      if($profileImage['size'] > 0){
        //checK For pRev file
      if(file_exists($path . '/' . $_SESSION["auth"]["profile_image"])){
            unlink($path . '/' . $_SESSION["auth"]["profile_image"]);
      }


        $filename='user-'.uniqid() .".$extension";
        $from= $profileImage['tmp_name'];
        $to= $path."/$filename"; 
        //echo $filename;
       $is_uploader=move_uploaded_file($from,$to);
       $query="UPDATE users SET fname='$fname',lname='$lname',
       email='$email',profile_image='$filename' WHERE id = '$user_id'";
       $res=mysqli_query($conn,$query);
      }else{
        $query="UPDATE users SET fname='$fname',lname='$lname',email='$email' WHERE id = '$user_id'";
        $res=mysqli_query($conn,$query);
      }
      if($res){
           $_SESSION["auth"]["fname"]=$fname;
           $_SESSION["auth"]["lname"]=$lname;
           $_SESSION["auth"]["email"]=$email;

           if($profileImage['size'] > 0){
              $_SESSION["auth"]["profile_image"] = $filename;
           }
           header("location: ../bacKend/profile.php");
      }
     /*
      $filename='user-'.uniqid() .".$extension";
      $from= $profileImage['tmp_name'];
      $to= $path."/$filename"; 
      //echo $filename;
     $is_uploader=move_uploaded_file($from,$to);
     */
    // var_dump($is_uploader);
     //uniqid() or time
     //echo $to;
    //if uploaded true
    //if($is_uploader){
    //  $query="UPDATE users SET fname='$fname',lname='$lname',email='$email',profile_image='$filename' WHERE 1";
    //}else{

   // }
  }  
?>