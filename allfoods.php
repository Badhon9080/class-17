<?php
   include_once "./bacend-lay/header.php";
   include_once "../database/env.php";
   //niz
   $query= "SELECT * FROM foods";
   $res=mysqli_query($conn,$query);
   $rests=mysqli_fetch_all($res,1);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                  allfoods
                </div>
                <!-- /.container-fluid -->
                <table class="table-resposive table table-hover table-striped">
                          <tr>
                               <td>
                                 #
                              </td>
                              <td>
                                 category
                              </td>
                              <td>
                              title 
                              </td>
                              <td>
                              detail 
                              </td>
                              <td>
                              price 
                              </td>
                              <td>
                              food_image
                              </td>
                              <td>
                                 action
                              </td>
                          </tr>

   <!--niz-->
       <?php
           foreach($rests as $key=>$rest){
       ?>
                          <tr>
                               <td><?= ++$key     ?>
                              </td>
                              <td>
                                <?=  $rest["category"]      ?>
                              </td>
                              <td>
                              <?=  $rest["title"]      ?> 
                              </td>
                              
                              <td>
                              <?=  $rest["detail"]      ?> 
                              </td>
                              <td>
                              <?=  $rest["price"]      ?> 
                              </td>
                              <td>
                          <img style="width: 100px;" src="../uploads/foods/<?=  $rest["food_image"]   ?>"    alt="">
                              </td>
                              <td>
                                      
                                     <div class="btn-group">
                                          <a href="./editfood.php?edit_id=<?= $rest["id"] ?>" class="btn btn-primary btn-sm">edit</a>
                                          <a href="../controller/delete.php?id=<?= $rest["id"] ?>" class="btn btn-danger btn-sm">delete</a>
                                     </div>

                              </td>
                          </tr>
           <?php
            } 
           ?>            
                </table>
<?php
   include_once "./bacend-lay/footer.php";
?>