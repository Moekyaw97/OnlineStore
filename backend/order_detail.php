<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) {
include 'include/header.php';
include 'dbconnect.php';

$voucherno=$_GET['voucherno'];


$sql= "SELECT orders.*,orders.created_at as order_date ,ordersdetails.*,items.*,users.name as customer_name,users.phone as customer_phone,users.address as customer_address FROM ordersdetails 
  INNER JOIN orders ON orders.voucherno=ordersdetails.voucherno
  INNER JOIN items ON ordersdetails.item_id=items.id
  INNER JOIN users ON orders.user_id=users.id WHERE ordersdetails.voucherno=:voucherno";
$stmt=$pdo->prepare($sql);
$stmt->bindParam('voucherno',$voucherno);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($ordersdetails); die();

$sql1 = "SELECT ordersdetails.*, items.* FROM ordersdetails INNER JOIN items ON ordersdetails.item_id = items.id WHERE ordersdetails.voucherno=:voucherno";
$stmt = $pdo->prepare($sql1);
$stmt->bindParam(':voucherno', $voucherno);
$stmt->execute();
$v_orders = $stmt->fetchAll();


 ?>


        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
            <a href="order_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="icofont-arrow-left"></i> Go Back</a>
          </div>
      </div>	
      <div class="card-body">
        <div align="center" class="text-dark">
          <h2>Mk Online Shop</h2>
          <h3><i class="fas fa-map-marker-alt"></i>No.7,MTP Condo,Hlaing,Yangon</h3>
          <h3><i class="fas fa-phone-square-alt"></i>&nbsp;09-953352626</h3>
          <h3>....................................RECIEPT....................................</h3><br>
        </div>

        <div class="row">
          <div class="col-md-9 ">
            <h5>Customer Name:<span class="text-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$data['customer_name']?> </span></h5>
          </div>
          <div class="col-md-3 float-right">
            <h5>Voucher No:<span class="text-dark">&nbsp;&nbsp;<?=$data['voucherno']?> </span></h5>
          </div>
           <div class="col-md-9">
            <h5>Customer Phone:<span class="text-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$data['customer_phone']?> </span></h5>
          </div>
          
          <div class="col-md-9">
            <h5>Customer Address:<span class="text-dark">&nbsp;&nbsp;<?=$data['customer_address']?> </span></h5>
          </div>
          <div class="col-md-3">
            <h5>Order Time:<span class="text-dark">&nbsp;&nbsp;<?=$data['order_date']?> </span></h5>
          </div>
         
          
          
        </div>
        
              <div class="table-responsive">
                
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                   <tr>
                    
                      <th>No.</th>
                      <th>Item Name</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Origianl Amount</th>
                      <th>Discount</th>
                      
                      
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php 
                    $i=1;$totalDiscount=0;$originalAmount=0;
                      foreach ($v_orders as $v_order) {
                      
                     ?>
                     <tr><td><?=$i++?></td>
                          <td><?=$v_order['name']?></td>
                          <td><?=$v_order['price']?></td>
                          <td><?=$v_order['qty']?></td>
                          <td><?=$v_order['price']*$v_order['qty']?></td>
                          <td><?=$v_order['price']-$v_order['discount']?></td>
                            
                    </tr>
                   <?php 
                   $totalDiscount=$totalDiscount+ ($v_order['price']-$v_order['discount']);
                   $originalAmount=$originalAmount+$v_order['price'];
                    }
                  ?>
                   <tr>
                  <td colspan="4">Amount</td>
                  <td ><?=$originalAmount?>&nbsp;&nbsp;&nbsp;&nbsp;MMK</td>
                  <td ><?=$totalDiscount?>&nbsp;&nbsp;&nbsp;&nbsp;MMK</td>


                  </tr>
                  <tr >
                  <td colspan="4" >Net Amount</td>
                  <td colspan="2" class="text-center"><?=$data['total']?>&nbsp;&nbsp;&nbsp;&nbsp;MMK</td>
                  </tr>
                    
                  </tbody>
                  <tfoot>
                    
                  </tfoot>

                </table>
                  <div align="center">
                    <h4>......Thank You......</h4>
                  </div>
              </div>
            </div>

      <?php 
      include 'include/footer.php';
       }else{
          header("location:../frontend/home.php");
          }
       ?>