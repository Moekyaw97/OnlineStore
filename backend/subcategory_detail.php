<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
include 'include/header.php';
include 'dbconnect.php';

$id=$_GET['subcategory_id'];
$sql="SELECT subcategories.*,subcategories.name as subcategory_name FROM subcategories ";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$subcategory=$stmt->fetch(PDO::FETCH_ASSOC);
	

 ?>
   <div class="container-fluid">

          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-center">Subcategory Detail</h1>
          </div>
            
            

          <div class="card">
          	
          	<div class="card-body">
          		<div class="row">
          			
          			<div class="col-md-8">
       
          				
                  				<h5>Subcategory Name:<span class="text-dark"><?=$subcategory['subcategory_name']?> </span></h5>
                  				
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