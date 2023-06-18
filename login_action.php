<?php 
	session_start();
	require("connect.php");
	$username=$_POST["txtUsername"];
	$password=($_POST["txtPassword"]);
	//kiem tra xem co trong CSDL hay khong
	$sql="select * from customers where username='".$username."' and password='".$password."'";
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows>0) {
		$row = $result->fetch_assoc();
		$_SESSION["name"] = $row["Customer_Name"];
		$_SESSION["login_error"] = "";
		$_SESSION["login"]=TRUE;
		$_SESSION["customerid"] = $row["Customer_ID"];

		
		// them uid vao session:
		header("Location: home.php");
	} else {
		$_SESSION["login_error"]="Username or Password incorrect! Please try again!";
		$_SESSION["login"] = FALSE;
		header("Location: login.php");
	}
	$conn->close();
?>