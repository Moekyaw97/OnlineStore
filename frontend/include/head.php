  <?php  

  session_start();
  include '../backend/dbconnect.php';
  $sql="SELECT * FROM subcategories";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
  $subcategories=$stmt->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
  <title>MK Online</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


      <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.bundle.min.js" ></script>

      <script type="text/javascript" src="js/script.js"></script>

      <link rel="stylesheet" type="text/css" href="icofont/icofont.min.css">
      <link rel="icon" type="image/gif" href="image/mk.png" sizes="16x16">
      <link rel="stylesheet" type="text/css" href="style.css">

      <script>
$(function() {
  $('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
});
</script>
     
    
</head>
<body>

  
  <div id="banner">
    <div class="container-fluid">

      <nav class="navbar navbar-expand-xl navbar-light navbar-inverse">
  <a class="navbar-brand" href="home.php"><img src="image/mk.png" id="logo" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item mx-3 mt-5">
        <a class="nav-link " href="home.php"><i class="icofont-home"></i>HOME <!-- <span class="sr-only">(current)</span> --></a>
      </li>
      <li class="nav-item mx-2 mt-5">
        <a class="nav-link" href="product.php">PRODUCTS</a>
      </li>
      <li class="nav-item dropdown mt-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CATEGORIES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php  
          foreach ($subcategories as $subcategory) {
         ?>
         <a class="dropdown-item" href="category.php?id=<?=$subcategory['id']?>"><?=$subcategory['name']?></a>
       <?php } ?>
        </div>
      </li>
     

     <?php 
      if (isset($_SESSION['loginuser'])){
        ?>

        <li class="nav-item dropdown mt-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" >
          <?=$_SESSION['loginuser']['name']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    <?php 
     }else{ 
     ?>
       
      <li class="nav-item mx-2 mr-3 mt-5">
        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>
      </li>
      <li class="nav-item mx-2 mr-3 mt-5">
        <a class="nav-link" href="register.php">REGISTER</a>
      </li>
      <?php } ?>

      <li class="nav-item mx-2 mr-5">
       <a class="nav-link" href="checkout.php"  id="count">
         <span class="p1 fa-stack has-badge" id="item_count">
           <i class="p3 fas fa-shopping-cart fa-stack-1xxfa-inverse icon_size"></i>
         </span>
       </a>
      </li>
      
    </ul>
     <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search . . ." aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="icofont-search-2"></i></button>
        </form>
     
  </div>

  
</nav>    
    </div>
  </div>