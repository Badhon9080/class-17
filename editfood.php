<?php
    // echo "hi"
    include_once "./bacend-lay/header.php";
    include "../database/env.php";
    $edited_id=$_REQUEST["edit_id"];
     $query="SELECT * FROM foods WHERE id = '$edited_id'";
     $res=mysqli_query($conn,$query);
     $restings= mysqli_fetch_assoc($res);
   // print_r($categories);
  /* 
    $categoryquery="SELECT * FROM categories";
    $results=mysqli_query($conn,$categoryquery);
    $foodcategories=mysqli_fetch_assoc($results,1);
   */
    $categoryQuery = "SELECT * FROM categories";
    $catResult= mysqli_query($conn,$categoryQuery);
    $categoryFetch= mysqli_fetch_all($catResult,1);
    /*
    echo "<pre>";
    print_r($categoryFetch);
    echo "</pre>";
  */
?>
<h1 class="h3 mb-4 text-gray-800">menu page</h1>
<div class="wrapper mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header" style="text-transform:capitalize; color:purple">edit info</div>
                <div class="card-body">
 <form class="d-flex flex-wrap" enctype="multipart/form-data"  action="../controller/update.php" method="post">
                        
                         <div class="col-lg-3">

                                      <label class="d-block" for="profileInput">
                                        <img style="max-width:100%" class="profileImage" src="../uploads/foods/<?= $restings["food_image"]  ?> ">
                                        <!--google search:placeholder image-->
                                      </label>   
                                      <input accept=".jpg,.png,.jpeg" name="food_img" class="d-none" type="file" id="profileInput">   
                             <span class="text-danger">
                                <?=  $_SESSION['errors']["food_img"]  ??   ''   ?>
                             </span>    
                              </div>
                              <div class="col-lg-7">
                                <input hidden type="text" name="hidden_id" value="<?= $restings["id"]   ?>">
                                 <input value="<?= $restings["title"]   ?>" type="text" class="form-control my-3" name="title" placeholder="foods name">
                                 <textarea name="details" class="form-control my-3" placeholder="foods details"><?= $restings["detail"]   ?></textarea>
                                 <input value="<?= $restings["price"]   ?>" type="text" class="form-control my-3" name="price" placeholder="foods price">
                                <select name="category" class="form-control my-3">
                                       <option disabled selected>select an category</option>
                                       <?php
                                               foreach($categoryFetch as $category){
                                                ?>
                                                 <option value="<?=  $category["category_title"]    ?>">
                                                 <?=  ucwords($category["category_title"])    ?>
                                                </option>

                                           <?php 
                                                 foreach($categoryFetch as $category){
                                                  ?>
                                                     <option value="<?=  $category["category_title"]    ?>">
                                                        <?=  $category["category_title"]    ?>
                                                     </option>
                                                 <?php

                                                 } 
                                               }
                                       ?>
                                      
                                </select>
                                 <button name="update_btn" type="submit"  class="btn btn-primary my-3">update</button>
                        </div>
     </form>
                </div>
            </div>
        </div>
<?php
    include_once "./bacend-lay/footer.php";
    unset($_SESSION["errors"]);
?>
<script>
   let profileInput  = document.querySelector("#profileInput")
   let profileImage = document.querySelector('.profileImage')
  // console.log(profileInput);
  function updatePreviewImage(event){
    //alert('hi')
 let url = URL.createObjectURL(event.target.files[0])
// let profileImage = document.querySelector('.profileImage')
   // console.log(event.target.files[0]);
 //  console.log(url);
 profileImage.src = url;
  }
  profileInput.addEventListener('change',updatePreviewImage)
</script>