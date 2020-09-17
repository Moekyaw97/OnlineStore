<?php 

include 'dbconnect.php';

$id=$_POST['id'];

$subcategory=$_POST['subcategory_name'];


$sql="UPDATE subcategories SET name=:name WHERE id=:id";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":name",$subcategory);





$stmt->execute();

header("location:subcategory_list.php");



 ?>