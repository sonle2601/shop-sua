<?php 
session_start();
	if ($_SESSION["login"] == FALSE){
		//phải đăng nhập thì mới cho vào
		$_SESSION["login_error"] = "Please login!";
		header("Location: login.php");
	}
require("connect.php");
$cid = $_SESSION["customerid"];
$sql = "select * from order_items join products on order_items.ProductID = products.Product_ID where order_items.CustomerID = '".$cid."'";
$result=$conn->query($sql) or die($conn->error);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="template/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/css/util.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="template/css/main.css">
    <!--===============================================================================================-->
    <style>
    table {
        background-image: url("https://nutifood.com.vn/themes/triangle/images/bg_footer-04.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>

</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v2">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="home.php" class="logo">
                        <img src="img/logo.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="home.php">Home</a>
                                <i class="fa-solid fa-store" style="color: #6297f4;"></i>
                            </li>

                            <li>
                                <a href="cart.php">Cart</a>
                                <i class="fa-solid fa-cart-shopping" style="color: #73a2f2;"></i>
                            </li>
                            <li>
                                <a href="status.php">Order</a>
                                <i class="fa-solid fa-money-check-dollar" style="color: #5f93ec;"></i>
                            </li>


                            <li>
                                <a href="https://www.facebook.com/vinamilkvuikhoemoingay">Contact</a>
                                <i class="fab fa-facebook-square" style="color: #7ca6ee;"></i>
                            </li>


                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full mr-5">
                        <a href="cart.php">
                            <div class="flex-c-m h-full p-l-18 p-r-25 ">
                                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                                    data-notify="2">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </a>
                        <ul>
                            <?php if(isset($_SESSION["login"])){ ?>
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>
                            <li>
                                Hello
                                <?php echo $_SESSION["name"] ?>
                            </li>
                            <?php } else { ?>
                            <li>
                                <a href="login.php">Login</a>
                            </li>
                            <?php } ?>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>




    </header>

    <img src="/img/anhbo1.jpg" alt="" style="max-width: 300px; height: auto; margin-left : 750px;">
    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85" method='post' action='buy.php'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart" style="width: 100%;">
                                <tr class="table_head">
                                    <th class="column-1">choose</th>
                                    <th class="column-2">Product</th>
                                    <th class="column-3"></th>
                                    <th class="column-4">Price</th>
                                    <th class="column-5">Quantity</th>
                                    <th class="column-6">Total</th>
                                    <th class="column-7">Delete</th>
                                </tr>
                                <?php
if ($result->num_rows == 0) {
    echo "<tr><td colspan='6' style='text-center';>No products have been added to the cart!</td></tr>";
} else {
    while ($row = $result->fetch_assoc()) {
        echo " 
        <tr class='table_row'>
        <td class='column-1'><input type='checkbox' name='check[]' value='".$row['OrderItemID']."'></td>
            <td class='column-2'>
                <div class='how-itemcart1'>
                    <img src='img/".$row["Image"]."' alt='IMG-BANNER'>
                </div>
            </td>
            <td class='column-3'>".$row["Product_Name"]."</td>
            <td class='column-4'>".$row["Price"]."</td>
            <td class='column-4'>
                <div class='wrap-num-product flex-w m-l-auto m-r-0'>
                    <div class='btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m'>
                        <i class='fs-16 zmdi zmdi-minus'></i>
                    </div>
                    <input class='mtext-104 cl3 txt-center num-product' type='number'
                        name='num-product1' value='".$row["Quantity"]."'>
                    <div class='btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m'>
                        <i class='fs-16 zmdi zmdi-plus'></i>
                    </div>
                </div>
               
            </td>
            <td class='column-6'>".$row["Price"]*$row["Quantity"].".000đ</td>
            
            <td class='column-7'><a class='no-style' href='/delete_cart.php?order=". $row["OrderItemID"] . "'>Delete</a></td>
        </tr>";
        
    }
}
?>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" placeholder="Coupon Code">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            <button type='submit'
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Order
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </form>




    <!-- Footer -->


    <!--===============================================================================================-->
    <script src="template/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="template/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="template/vendor/bootstrap/js/popper.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="template/vendor/select2/select2.min.js"></script>
    <script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
    </script>
    <!--===============================================================================================-->
    <script src="template/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="template/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
    </script>
    <!--===============================================================================================-->
    <script src="template/js/main.js"></script>

</body>

</html>