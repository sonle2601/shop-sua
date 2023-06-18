<?php 
	session_start();
	require("connect.php");
	$username=$_POST["txtUsername"];
	$password=($_POST["txtPassword"]);
	$address=$_POST["txtAdd"];
	$fullname=$_POST["txtName"];
	$tel = $_POST["txtPhone"];
	$sql = "select * from customers where username='".$username."'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows > 0) {
		$_SESSION["register_error"]="User ".$username." exist! Try again!";
		header("Location: register.php");
	} else {
		$sql_insert = "insert into customers(username,password,Customer_Name,Shipping_Address,Phone) values ('".$username."','".$password."','".$fullname."','".$address."',".$tel.")";
		if ($conn->query($sql_insert)==TRUE){
			$_SESSION["login_error"]="User register success! Please login!";
			header("Location: login.php");
		} else {
			$_SESSION["register_error"] = "Register fail, please try again!";
			header("Location: register.php");
		}
	}
	$conn->close();
?>