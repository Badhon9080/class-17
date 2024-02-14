<?php
   session_start();
   include "../database/env.php";
   $oldpsw = $_REQUEST["old_psw"];
   $psw = $_REQUEST["psw"];
   $confirmpsw = $_REQUEST["confirm_psw"];
   $errors=[];
   //echo $old ;
   $dbpsw=$_SESSION["auth"]["password"];
   //echo $dbpsw;
  // var_dump(password_verify($oldpsw,$dbpsw));
  $is_password_truth=password_verify($oldpsw,$dbpsw);
  $id=$_SESSION["auth"]["id"];
  if(!$is_password_truth){
    $errors["old_psw"]="sorry your old password did not match!";
    $_SESSION["errors"]=$errors;
     header("location: ../bacKend/profile.php");
  }else{
    if(empty($psw)){
        $errors["psw"]="new password required!";
    }
    if($psw != $confirmpsw){
        $errors["psw"]="new password and confirm password did not match!";
    }
    if(count($errors) > 0){
        $_SESSION["errors"]=$errors;
        header("location: ../bacKend/profile.php");
    }else{
        //proceed
        $encpass=password_hash($psw,PASSWORD_BCRYPT);
        //echo $encpass;
        $query="UPDATE users SET password='$encpass' WHERE id='$id'";
        $res=mysqli_query($conn,$query);
        if($res){
            $_SESSION["auth"]["password"] = $encpass;
            header("location: ../bacKend/profile.php");
        }
    }

  }
?>