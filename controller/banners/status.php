<?php

include '../../database/env.php';
$status_id =$_REQUEST["status_id"];
/*
$statusQuery="UPDATE banners SET status = 0 WHERE id = $status_id";
mysqli_query($conn,$statusQuery);
*/
$allStatusData="SELECT status  FROM banners WHERE id = $status_id";

$test = mysqli_query($conn,$allStatusData);

$test_2 = mysqli_fetch_assoc($test);

/*
echo "<pre>";
   print_r($test_2['status']);
echo "</pre>";
*/
if($test_2['status'] == 1){
    $statusQuery="UPDATE banners SET status = 0";
    mysqli_query($conn,$statusQuery);
}else{

    $statusQuery="UPDATE banners SET status = 0";
    mysqli_query($conn,$statusQuery);

    $statusQuery="UPDATE banners SET status = 1 WHERE id = $status_id";
    mysqli_query($conn,$statusQuery);
}
header("location: ../../bacKend/allbanner.php");
?>