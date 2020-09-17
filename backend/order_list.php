<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
include 'include/header.php';
include 'dbconnect.php';
$status=1;
$sql="SELECT orders.*,users.name as user_name FROM orders INNER JOIN users ON orders.user_id=users.id WHERE orders.status=:status";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':status',$status);
$stmt->execute();
$orders=$stmt->fetchAll();

 ?>


        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order List</h1>
           
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
                      <th>Voucher No</th>
                      <th>Order Date</th>
                      <th>User Name</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>No.</th>
                      <th>Voucher No</th>
                      <th>Order Date</th>
                      <th>User Name</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                    $i=1;
                      foreach ($orders as $order) {
                      
                     ?>
                     <tr><td><?=$i++?></td>
                          <td><?=$order['voucherno']?></td>
                          <td><?=$order['orderdate']?></td>
                          <td><?=$order['user_name']?></td>
                          <td><?=$order['total']?></td>
                          <td><a href="order_detail.php?voucherno=<?=$order['voucherno']?>" class="btn btn-primary btn-sm">Detail</a>
                            <a href="confirm.php?id=<?=$order['id']?>" class="btn btn-success btn-sm">Confirm</a></td>
                      
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