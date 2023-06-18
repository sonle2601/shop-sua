<?php
	session_start();
	if ($_SESSION["login"] == FALSE){
		//phải đăng nhập thì mới cho vào
		$_SESSION["login_error"] = "Please login!";
		header("Location: login.php");
	}
	if (!isset($_SESSION["product_add_error"]))
			$_SESSION["product_add_error"]="";
            require("connect.php");
            $pid = $_POST["proID"];
            $cid = $_SESSION["customerid"];
           $quantity = $_POST['quantity'];
           $sql = "select * from order_items where ProductID='".$pid."'";
	       $result=$conn->query($sql) or die($conn->error);
           if ($result->num_rows>0){
            $sql = "update order_items  set Quantity =Quantity +'".$quantity."' where ProductID='".$pid."'";
            $result=$conn->query($sql);
				$_SESSION["product_add_success"]="Add new success!";

            header("Location: detail.php?pid=".$pid);
        } else {
            $sql = "insert into order_items(CustomerID,ProductID,Quantity) values ('".$cid."','".$pid."',".$quantity.")";
            if ($conn->query($sql)==TRUE){
				$_SESSION["product_add_success"]="Add new success!";
				$_SESSION["product_add_success"] = "";
				header("Location: detail.php?pid=".$pid);
			} else {
				$_SESSION["product_add_success"]=$sql." ".$conn->error;
				$_SESSION["product_add_error"] = "";
				header("Location: detail.php");
			}
        }
?>