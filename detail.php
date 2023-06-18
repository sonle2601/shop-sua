<?php 
session_start();
require("connect.php");
$pid = $_REQUEST["pid"];
$sql = "select * from products where  Product_ID = ".$pid;
$result=$conn->query($sql) or die($conn->error);
$row=$result->fetch_assoc();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
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




    <!-- Cart -->



    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="img/<?php  echo $row["Image"] ; ?>">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="img/<?php  echo $row["Image"] ; ?>" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="images/product-detail-01.jpg">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            <?php  echo $row["Product_Name"] ; ?>
                        </h4>

                        <span class="mtext-106 cl2">
                            <?php  echo $row["Price"] ; ?>đ

                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare
                            feugiat.
                        </p>

                        <!--  -->
                        <form action="cart_add.php" method="post">
                            <div class="p-t-33">

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-30">

                                            <input type="number" name="quantity" class="form-control" value="1">
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="submit"
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                Thêm vào giỏ hàng
                                            </button>
                                            <button type="submit" formaction="buy.php"
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail m-l-40">
                                                Mua ngay
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="proID" value="<?php echo $pid ?>">
                        </form>

                        <!--  -->

                    </div>
                </div>
            </div>


        </div>


    </section>





    <!-- Footer -->





    <!-- Modal1 -->


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