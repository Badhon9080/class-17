<?php
   include_once "./bacend-lay/header.php";
   include_once "../database/env.php";
   $query="SELECT * FROM categories";
   $res=mysqli_query($conn,$query);
   $categories=mysqli_fetch_all($res,1);
 //   print_r($categories);
 $edited_id=$_REQUEST["edited-id"] ?? null;
 if($edited_id){
     $query="SELECT * FROM categories WHERE id='$edited_id'";
     $res=mysqli_query($conn,$query);
     $edited_category=mysqli_fetch_assoc($res);
   //  print_r($edited_category);
 }
?>

<main>
    <div class="container">
        <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <?= $edited_id ? "edit" : "add" ?> category
                </div>
                <div class="card-body">
                    <form action="../controller/<?= $edited_id ? "category-update" : "categorystore" ?>.php" method="post">
                    <input type="hidden" name="id" value="<?= $edited_category["id"] ?? '' ?>">
                              <input value="<?= $edited_category["category_title"] ?? '' ?>" name="category_title" type="text" placeholder="enter your category name"  class="form-control">
                              <button type="submit" class="btn btn-primary rounded-o btn-sm mt-2">
                                  <?= $edited_id ? "update" : "submit"  ?>
                              </button>
                    </form>
                </div>
            </div>
        </div>
  <div class="col-lg-8">
        <div class="card shadow">
                <div class="card-header">
                    all category
                </div>
                <div class="card-body">
                  
                    
                 <div class="table-responsive">
                       <table class="table text-center">


                           <tr>
                            <th>#</th>
                            <th>category title</th>
                            <th>status</th>
                            <th>action</th>
                           </tr>
                           
                               <?php
                                   foreach($categories as $key=>$category){
                                ?>    
                                    <tr><td><?= ++$key ?></td>
                                    <td><?= $category["category_title"] ?></td>
                                    <td>
                                        <a href="../controller/categories-statusupdate.php?id=<?= $category["id"] ?>&status=<?= $category["status"] ?>" class="text-warning">
                                        <i class="fa-<?= $category["status"]  == 1 ? "solid" : "regular"   ?> fa-star"></i>
                                       <!-- <i class="fa-regular fa-star"></i>   -->
                                        </a>
                                </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="./categories.php?edited-id=<?= $category["id"] ?>" class="btn btn-sm btn-warning m-3">edit</a>
                                            <a href="../controller/categorydelete.php?id=<?= $category["id"] ?>" class="deleteBtn btn btn-sm btn-danger m-3">delete</a>
                                        </div>
                                    </td>
                                </tr>
                               <?php 
                                   }
                               ?>
                       </table>
                 </div>


             </div>
      </div>
 </div>
 </div>
    </div>
</main>


<?php
   include_once "./bacend-lay/footer.php";

?>

<script>
    $(function(){
           $('.deleteBtn').click( function(event){
               event.preventDefault()
              
                 //alert
Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href =  $(this).attr('href') 
  }
});
                 //alert end



           } )

    })
     
</script>