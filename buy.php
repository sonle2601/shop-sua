<?php 
session_start();
require("connect.php");
$cid = $_SESSION["customerid"];
if(!isset($_POST["check"])){
    $order = $_POST["proID"];
    $_SESSION['order'] = $_POST["proID"];
}else{
    $order = $_POST["check"];
    $_SESSION['order'] = $_POST["check"];
}


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


    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85" method='post' action='add_order.php'>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                                <?php
                             $sum = 0;
                                               
                             $checkedItems = $order;
                             
                             if (is_array($checkedItems)) {
                                 foreach ($checkedItems as $item) {
                                     $sql = "SELECT * FROM order_items 
                                             JOIN products ON order_items.ProductID = products.Product_ID 
                                             WHERE order_items.OrderItemID = '".$item."'";
                                     $result = $conn->query($sql) or die($conn->error);
                                     $row = $result->fetch_assoc();
                             
                                     // Tiếp tục xử lý dữ liệu trong $row
                                     
                                     if ($result->num_rows == 0) {
                                         echo "<tr><td colspan='6'>No Record!</td></tr>";
                                     } else {
                                         echo "
                                         <tr class='table_row'>
                                             <td class='column-1'>
                                                 <div class='how-itemcart1'>
                                                     <img src='img/".$row["Image"]."' alt='IMG-BANNER'>
                                                 </div>
                                             </td>
                                             <td class='column-2'>".$row["Product_Name"]."</td>
                                             <td class='column-3'>".$row["Price"]."đ</td>
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
                                             <td class='column-5'>".$row["Price"]*$row["Quantity"].".000đ</td>
                                         </tr>";
                                         
                                         $sum = $sum + $row["Price"]*$row["Quantity"];
                                     }
                                 }
                             } else {
                                $sql = "SELECT * FROM order_items 
                                JOIN products ON order_items.ProductID = products.Product_ID 
                                WHERE order_items.OrderItemID = '".$checkedItems."'";
                        $result = $conn->query($sql) or die($conn->error);
                        $row = $result->fetch_assoc();
                
                        // Tiếp tục xử lý dữ liệu trong $row
                        
                        if ($result->num_rows == 0) {
                            echo "<tr><td colspan='6'>No Record!</td></tr>";
                        } else {
                            echo "
                            <tr class='table_row'>
                                <td class='column-1'>
                                    <div class='how-itemcart1'>
                                        <img src='img/".$row["Image"]."' alt='IMG-BANNER'>
                                    </div>
                                </td>
                                <td class='column-2'>".$row["Product_Name"]."</td>
                                <td class='column-3'>".$row["Price"]."đ</td>
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
                                <td class='column-5'>".$row["Price"]*$row["Quantity"].".000đ</td>
                            </tr>";
                            $sum = $sum + $row["Price"]*$row["Quantity"];
                           
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


                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    <?php echo $subtotal = 15 ?>.000đ
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>


                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <!-- <p class="stext-111 cl6 p-t-2">
                                        There are no shipping methods available. Please double check your address, or
                                        contact us if you need any help.
                                    </p> -->

                                <div class="p-t-15">


                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name"
                                            placeholder="Tên người nhận">
                                    </div>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone"
                                            placeholder="Số điện thoại">
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <textarea name="address" id="" cols="10" rows="10"> Địa chỉ nhận</textarea>
                                    </div>





                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    <input type="text" name="money" id="" value="<?php echo $sum+$subtotal ?>"
                                        readonly>.000đ
                                </span>
                            </div>
                        </div>

                        <button type="submit" formaction='add_order.php'
                            class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
                <input type="hidden" name="check[]" value='<?php echo $order ?>'>
    </form>

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