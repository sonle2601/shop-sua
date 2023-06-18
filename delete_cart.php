<?php
	session_start();
	if ($_SESSION["login"] == FALSE){
		//phải đăng nhập thì mới cho vào
		$_SESSION["login_error"] = "Please login!";
		header("Location: login.php");
	}
	if (!isset($_SESSION["categories_edit_error"]))
			$_SESSION["categories_edit_error"]="";
	require("connect.php");
    $order = $_REQUEST["order"];
    $sql = "delete from order_items where OrderItemID ='".$order."'";
    $result=$conn->query($sql) or die($conn->error);
    header("Location: cart.php");
    ?>