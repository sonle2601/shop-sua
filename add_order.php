<?php
	session_start();
	if ($_SESSION["login"] == FALSE){
		//phải đăng nhập thì mới cho vào
		$_SESSION["login_error"] = "Please login!";
		header("Location: login.php");
	}
            require("connect.php");
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $add = $_POST["address"];
            $money = $_POST["money"];
            $checkedItems = $_SESSION['order'] ;
         
$cid = $_SESSION["customerid"]; 
            foreach ($checkedItems as $item) {
                $sql = "INSERT INTO receive (name_receive, phone_receive, add_receive, order_item, money, customerid,status) VALUES 
                ('" . $name . "','" . $phone . "','" . $add . "','" . $item . "','" . $money . "','" . $cid . "','not delivery')";
                $result = $conn->query($sql) or die($conn->error);
            }
            

if ($result==TRUE){
$_SESSION["product_add_success"]="Add new success!";
$_SESSION["product_add_success"] = "";
$_SESSION['order']="";
header("Location: home.php");
} else {
$_SESSION["product_add_success"]=$sql." ".$conn->error;
$_SESSION["product_add_error"] = "";
$_SESSION['order']="";
header("Location: home.php");
}

?>