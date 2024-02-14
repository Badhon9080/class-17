<?php
   session_start();
   include_once "../database/env.php";
   $email=$_REQUEST["email"];
   $password=$_REQUEST["password"];
   //$errors=[];
   //email checKs!!!!!!!!!!
    $query="SELECT * FROM users WHERE email='$email'";
    $res=mysqli_query($conn,$query);
   // print_r($res->num_rows);
   //email not found
   if($res->num_rows == 0){
       $errors["email"]="your email address incorrect!";
       $_SESSION["errors"]=$errors;
      header("location: ../bacKend/login.php");
   }else{
   $dbUser=mysqli_fetch_assoc($res);
    //var_dump($dbUser["password"]);
     $isPasswordTrue=password_verify($password,$dbUser['password']);
    // var_dump($isPasswordTrue);
    //if password incorrect
    if(!$isPasswordTrue){
        $errors["password"]="your password incorrect!";
        $_SESSION["errors"]=$errors;
       header("location: ../bacKend/login.php");
    }else{
        //redirect to dashboard
        $_SESSION["auth"]=$dbUser;
        header("location: ../bacKend/dashboard.php");
    }
   }
?>