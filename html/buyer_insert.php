<?php 

$b_name=$_POST['b_name'];
$b_add=$_POST['b_add']
$b_num=$_POST['b_num'];
$b_email=$_POST['b_email'];
$b_password=$_POST['b_password'];
$conn=new mysqli('localhost','root','','vegetable');

if($conn->connect_error){
	die("connection failed".$conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into buyers(b_name,b_add,b_num,b_email,b_password) values(?,?,?,?,?)");
	$stmt->bind-param("ssiss",$b_name,$b_add,$b_num,$b_email,$b_password);
	$stmt->execute();
	echo "Registration successful";
	$stmt->close();
	$conn->close();
}
?>
