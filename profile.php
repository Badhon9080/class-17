<?php
  // session_start();
   include_once "./bacend-lay/header.php";
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">profile page</h1>
<div class="wrapper mt-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">profile info</div>
                <div class="card-body">
                <form class="d-flex flex-wrap" enctype="multipart/form-data"  action="../controller/profileupdate.php" method="post">
                        
                         <div class="col-lg-3">
                                      <label class="d-block" for="profileInput">
                                        <img style="max-width:100%;" class="profileImage" src="<?= getProfileImage()  ?>">
                                      </label>     
                             <input name="profileImage" class="d-none" type="file" id="profileInput">  
                             <span class="text-danger">
                                <?=  $_SESSION['errors']["profileImage"]  ??   ''   ?>
                             </span>    
                              </div>
                              <div class="col-lg-7">
                              <input name="fname" value="<?= $_SESSION["auth"]["fname"] ?? '' ?>" placeholder="first name" type="text" class="my-2 form-control">
                              <input name="lname" value="<?= $_SESSION["auth"]["lname"] ?? '' ?>" placeholder="Last name" type="text" class="my-2  form-control">
                              <input name="email" value="<?= $_SESSION["auth"]["email"] ?? '' ?>" placeholder="email" type="text" class="my-2  form-control">
                              <button type="submit"  class="btn btn-primary">update</button>
                        </div>
                 </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
             <div class="card">
                <div class="card-header">password update</div>
                <div class="card-body">
                    <form action="../controller/passwordupdate.php" method="post">
                        <input name="old_psw"  placeholder="old password" type="password" class="form-control">
                       <span class="text-danger">
                               <?= $_SESSION["errors"]["old_psw"]       ??        ''      ?>
                        </span> 
                        <input name="psw"  placeholder="new password" type="password" class="form-control">
                        <span class="text-danger">
                               <?= $_SESSION["errors"]["psw"]       ??        ''      ?>
                        </span> 
                        <input name="confirm_psw"  placeholder="confirm password" type="password" class="form-control">
                        
                        <button type="submit"  class="btn btn-primary">update password</button>
                    </form>
                </div>
             </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
<?php
   include_once "./bacend-lay/footer.php";
    unset($_SESSION['errors']); 
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