<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
include 'include/header.php';
include 'dbconnect.php';


  $id=$_GET['id'];
  $sql="SELECT * FROM brands WHERE id=:id";

  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $brand=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Brand Edit</h1>

  <div class="row">
    <div class="offset-md-2 col-md-8">
      <form method="POST" action="brand_update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$brand['id']?>">
        
        <div class="form-group"> <label>Name</label><input type="text" name="brand_name" class="form-control" value="<?=$brand['name']?>"></div>

        <div class="form-group"> <label>Logo</label><input type="file" name="brand_logo" class="form-control-file">
          <img src="<?=$brand['logo']?>" width="200" height="120" class="mt-3">
          <input type="hidden" name="old_photo" value="<?=$brand['logo']?>"></div>
       
                          
              

                  
                  <input type="submit" name="" class="btn btn-outline-primary float-right mb-3" value="Update">

                </form>

              </div>
            </div>

          </div>

          <?php 


          include 'include/footer.php';
          }else{
          header("location:../frontend/home.php");
          }


          ?>

