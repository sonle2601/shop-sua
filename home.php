<?php
    require("connect.php");
    session_start();
	$sql = "select * from products";
	$result=$conn->query($sql) or die($conn->error);
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>Trang chủ</title>
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
    <link rel="stylesheet" type="text/css" href="template/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template/css/util.css">
    <link rel="stylesheet" type="text/css" href="template/css/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--===============================================================================================-->

    <style>
    body {
        background-color: violet;
    }
    </style>


</head>

<body>

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


    <div class="sec-banner bg0">
        <h1 class="cl5 txt-center respon1" style="color: #7ca6ee;">
            List of products
        </h1>
        <div class="container">
            <div class="row">
                <!--  -->
                <?php
    if ($result->num_rows == 0) {
        echo "<tr><td colspan=6>No Record!</td></tr>";
    } else {
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='col-md-3 col-xl-3 px-0'>
            <a class='no-style' href='/detail.php?pid=" . $row["Product_ID"] . "'>
            <!-- Block3 -->
                        <div class='block1 wrap-pic-w' id='do-rong'>
                            <div class='block1-img'>
                                <img src='img/".$row["Image"]."' alt='IMG-BANNER'>
                                <div class='block2-txt' id='txt'>
                                    <h3>".$row["Product_Name"]."</h3><br>
                                    <h4>".$row["Price"]."đ</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>";
        }
    }
?>



            </div>
        </div>


    </div>







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
    <script src="template/vendor/daterangepicker/moment.min.js"></script>
    <script src="template/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="template/vendor/slick/slick.min.js"></script>
    <script src="template/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="template/vendor/parallax100/parallax100.js"></script>
    <script>
    $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="template/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
    </script>
    <!--===============================================================================================-->
    <script src="template/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="template/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
    $('.js-addwish-b2').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
    </script>
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