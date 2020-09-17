<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
include 'include/header.php';
include 'dbconnect.php';



 ?>


        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Item List</h1>
            <a href="item_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="icofont-ui-add"></i></i> Add Item</a>
          </div>
           <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Item list</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                   <tr>
                  	  <th>No.</th>
                      <th>Name</th>
                      <th>Codeno</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Codeno</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php 
                  		$i=1;
                  		$sql="SELECT * FROM items";
                  		$stmt=$pdo->prepare($sql);
                  		$stmt->execute();
                  		$items=$stmt->fetchAll();
                  		foreach ($items as $item) {
                  	?>
                  			<tr>
                  				<td><?= $i++;	?></td>
                  				
                  				

                  				<td><?=  $item['name'] ?></td>
                  				<td><?=  $item['codeno'] ?></td>
                  				
                  				<td><?php 
                  				if($item['discount']){
                  					echo $item['discount'];
                  				 ?>
                  					<del><?=$item['price']?></del>
                  				<?php }else{
                  					echo $item['price'];
                  				} ?>
                  				</td>
                  				<td class="text-center"><a href="item_detail.php?item_id=<?=$item['id']?>" class="btn btn-primary btn-sm">Detail</a><a href="item_edit.php?id=<?=$item['id']?>" class="btn btn-warning btn-sm ml-3">Edit</a><a href="item_delete.php?id=<?=$item['id']?>" class="btn btn-danger btn-sm ml-3" onclick="return confirm('Are you sure Delete?')">Delete</a></td>
                  			</tr>
						<?php
                  			}
                  	 	?>
                    
                  </tbody>
                </table>
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