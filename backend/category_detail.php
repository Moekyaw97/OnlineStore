<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
include 'include/header.php';
include 'dbconnect.php';

$id=$_GET['category_id'];
$sql="SELECT categories.*,categories.name as category_name FROM categories ";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$category=$stmt->fetch(PDO::FETCH_ASSOC);
	

 ?>
   <div class="container-fluid">

          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-center">Category Detail</h1>
            
            <a href="category_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="icofont-arrow-left"></i></i> Go Back</a>
          </div>

          <div class="card">
          	<div class="card-header">
          		<h5 class="card-title">Category Detail </h5>
          	</div>
          	<div class="card-body">
          		<div class="row">
          			<div class="col-md-4">
          				<img src="<?= $category['photo'] ?>" class="img-fluid">
          			</div>
          			<div class="col-md-8">
       
          				
                  				<h5>Category Name:<span class="text-dark"><?=$category['category_name']?> </span></h5>
                  				
          			</div>
          		</div>
          	</div>
          </div>
      </div>
      <?php 
      	include 'include/footer.php';
         }else{
          header("location:../frontend/home.php");
          }
       ?>