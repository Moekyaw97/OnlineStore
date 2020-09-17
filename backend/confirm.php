<?php 

include 'dbconnect.php';
$id=$_GET['id'];
$status=0;

$sql="UPDATE orders SET status=:status WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':id',$id);
$stmt->execute();

header("location:order_list.php");
 ?>