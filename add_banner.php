<?php
    // echo "hi"
    include_once "./bacend-lay/header.php";
?>
<h1 class="h3 mb-4 text-gray-800">profile page</h1>
<div class="wrapper mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header" style="text-transform:capitalize; color:purple">banners info</div>
                <div class="card-body">
                <form class="d-flex flex-wrap" enctype="multipart/form-data"  action="../controller/banners/store.php" method="post">
                        
                         <div class="col-lg-3">
                                      <label class="d-block" for="profileInput">
                                        <img style="max-width:100%" class="profileImage" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png">
                                        <!--google search:placeholder image-->
                                      </label>   
                                      <input accept=".png,.jpg,.jpeg" name="featured_img" class="d-none" type="file" id="profileInput">   
                             <span class="text-danger">
                                <?=  $_SESSION['errors']["profileImage"]  ??   ''   ?>
                             </span>    
                              </div>
                              <div class="col-lg-7">
                                 <input type="text" class="form-control my-3" name="title" placeholder="enter banner title">
                                 <textarea name="details" class="form-control my-3" placeholder="enter banner details"></textarea>
                                 <input type="text" class="form-control my-3" name="btn_title" placeholder="enter banner button title">
                                 <input type="text" class="form-control my-3" name="btn_link" placeholder="enter banner button link">
                                 <input type="text" class="form-control my-3" name="video_url" placeholder="enter banner video url">
                                 <button name="store_btn" type="submit"  class="btn btn-primary my-3">submit</button>
                        </div>
                 </form>
                </div>
            </div>
        </div>
<?php
    include_once "./bacend-lay/footer.php";
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