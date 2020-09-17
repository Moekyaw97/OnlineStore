<?php 

	include 'dbconnect.php';

		$name=$_POST['category_name'];
		$photo=$_FILES['category_photo'];

		
			

			$basepath="images/categories/";
			$fullpath=$basepath.$photo['name'];
			move_uploaded_file($photo['tmp_name'], $fullpath);

			$sql=" INSERT INTO categories(name,photo) VALUES(:category_name,:category_photo)";

			$stmt=$pdo->prepare($sql);
			
			$stmt->bindParam(':category_name',$name);
			$stmt->bindParam(':category_photo',$fullpath);
			

			$stmt->execute();

			if($stmt->rowCount()){
				header("location:index.php");
			}else{
				echo "Error";
			}


 ?>
