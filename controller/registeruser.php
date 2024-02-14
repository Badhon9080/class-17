<?php
    session_start();
    include "../database/env.php";
     $firstname=$_REQUEST["fname"];
     $lastname=$_REQUEST["lname"];
     $email=$_REQUEST["email"];
     $password=$_REQUEST["password"];
     $repeat_password=$_REQUEST["repeat_password"];
     $errors=[];
     if(empty($firstname)){
        $errors["name"]="where's your name?"; 
     }

     if(empty($email)){
        $errors["email"]="where's your email?"; 
     }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           $errors["email"]="invalid your email!";
     }
     if(empty($password)){
        $errors["password"]="where's your password?"; 
     }elseif(strlen($password)<8){
          $errors["password"]="you password has to be bigger than 8digits!";
     }
     if(empty($repeat_password)){
        $errors["repeat_password"]="where's your repeat_password?";
     }elseif($password!=$repeat_password){
        $errors["repeat_password"]="sorry! your repeat password did not match!";
     }
     if(count($errors)>0){
        $_SESSION["errors"]=$errors;
        header("location: ../bacKend/register.php");
     }else{
         //register
         $encpass=password_hash($password,PASSWORD_BCRYPT);
        // echo ($encpass);
        // exit();
         $query="INSERT INTO users (fname, lname, email, password) VALUES ('$firstname','$lastname','$email','$encpass')";
         $response=mysqli_query($conn,$query);
       //  var_dump($response);
       //successfully register
       if($response){
             header("location: ../bacKend/login.php");
       }else{
            //redirect to dashboard
            header("location: ../bacKend/dashboard.php");
       }
       
     }   
?>