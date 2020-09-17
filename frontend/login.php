<?php 
include 'include/head.php';
include '../backend/dbconnect.php';

if(!isset($_SESSION['loginuser'])){
 ?>


 <div class="container-fluid mt-5">
  <h1 class="h3 mb-4 text-gray-800 text-center">Login</h1>

  <div class="row" >
    <div class="offset-md-4 col-md-4 ">
      <form method="POST" action="signin.php" >
        
        <div class="form-group" > <label> Email :</label> <input type="email" name="user_email" class="form-control" style="border-radius: 20px;height: 50px;border: 3px solid green;"></div>
        <div class="form-group"><label> Password :</label><input type="password" name="user_password" class="form-control" style="border-radius: 20px;height: 50px;border: 3px solid green;"></div>
        
       
           

                  <input type="submit" name="" class="btn btn-success float-right mb-3" value="Login">
                

                </form>

              </div>
            </div>
          </div>
          <div>
  <br><br><br>
  <br><br><br>
  <br><br><br>
</div>


 <?php 

include 'include/foot.php';
}else{
  header("location:home.php");
}
  ?>



  

