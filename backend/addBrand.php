<?php 

	include 'dbconnect.php';

		$name=$_POST['brand_name'];
		$logo=$_FILES['brand_logo'];

		
		
			$basepath="images/brand/";
			$fullpath=$basepath.$logo['name'];
			move_uploaded_file($logo['tmp_name'], $fullpath);

			$sql=" INSERT INTO brands(name,logo) VALUES(:brand_name,:brand_logo)";

			$stmt=$pdo->prepare($sql);
			
			$stmt->bindParam(':brand_name',$name);
			$stmt->bindParam(':brand_logo',$fullpath);
			

			$stmt->execute();

			if($stmt->rowCount()){
				header("location:index.php");
			}else{
				echo "Error";
			}


 ?>
