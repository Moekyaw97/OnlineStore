<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
        include 'include/header.php'

 ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 text-center">Brand Create</h1>

          <div class="row">
            <div class="offset-md-2 col-md-8">
              <form method="POST" action="addBrand.php" enctype="multipart/form-data">
                <div class="form-group"> <label>Name</label><input type="text" name="brand_name" class="form-control"></div>

                <div class="form-group"> <label>Logo</label><input type="file" name="brand_logo" class="form-control-file" ></div>
                
                  
                <input type="submit" name="" class="btn btn-outline-primary float-right mr-5" value="Save">
              </form>


          
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

     
  
     <?php 


      include 'include/footer.php';
      }else{
  header("location:../frontend/home.php");
}


      ?>