<?php 
include 'include/head.php';
include '../backend/dbconnect.php';

$id=$_GET['id'];


$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategories_id=subcategories.id WHERE items.subcategories_id=:id";

  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $items=$stmt->fetchAll();

 ?>

  <div class="text-center"><h3>. . . Welcome to MK Online Shopping . . .</h3></div>


<div class="container-fluid text-center">
  <div id="carousels" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/lap1.jpg" class="img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/lap2.jpg" class="img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image/lap3.jpg" class="img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>
</div>


          <div class="text-center"><h1>NEW ARRIVAL</h1><hr></div>



  <div id="cards">
    <div class="container-fluid ">
      <div class="row justify-content-center my-5">

        
       <?php 
            foreach ($items as $item) {

              
            
         ?>


        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mt-5"><div class="card">
          <img class="card-img-top" width="200" height="350" src="../backend/<?=$item['photo']?>" alt="Card image cap">
          <div class="card-body">
            <p class="text-muted py-1 my-0"><b>CODENO:</b><?=$item['codeno']?></p>
            <p class="text-muted py-1 my-0"><b>NAME:</b><?=$item['name']?></p>
            <p class="text-muted py-1 my-0"><b>PRICE:</b>
              <?php if($item['discount']){
                echo $item['discount'];
                ?>
                <del><?=$item['price']?></del>
              <?php }else{
                echo $item['price'];
              } ?>
              
               </p>

            <a href="#" class="btn btn-info float-right addtocart" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-photo="<?=$item['photo']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>"><i class="icofont-cart-alt"></i></a>
          </div>
        </div></div>
        <?php 
        }
         ?>

       

      </div>
    </div>
  </div>

  

  <div id="item">
    <div class="container-fluid">
      <div></div>
    </div>
  </div>

 <?php 

include 'include/foot.php';
  ?>