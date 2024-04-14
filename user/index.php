<?php session_start(); ?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Farmer Project - Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../admin/uploads/logo/image.png">


    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<body>

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>

    <!--offcanvas menu area end-->

    <?php include 'header.php'; ?>

    <!--header area end-->

    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Fresh Vegetables</h1>
                                <h2>Fresh Farm Products</h2>
                                <p>
                                    10% certifled-organic mix of fruit and veggies. Perfect for weekly cooking and
                                    snacking!
                                </p>
                                <a href="productlist.php">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Norwegian Planters</h1>
                                <h2>Natural Farm Products</h2>
                                <p>
                                    Widest range of farm-fresh Vegetables, Fruits & seasonal produce
                                </p>
                                <a href="productlist.php">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Fresh Tomatoes</h1>
                                <h2>Natural Farm Products</h2>
                                <p>
                                    Natural organic tomatoes make your health stronger. Put your information here
                                </p>
                                <a href="productlist.php">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping1.jpg" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all US order or order above 20000</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping col_2">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping2.jpg" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Support 24/7</h3>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping3.jpg" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>30 Days Return</h3>
                            <p>Simply return it within 30 days for an exchange</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping col_4">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping4.jpg" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>100% Payment Secure</h3>
                            <p>We ensure secure payment with PEV</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  logo section -->
    <section class="section-b-space pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slide-6 no-arrow">
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/9.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/10.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/11.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/12.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/13.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/14.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/15.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="logo-block">
                                        <a href="#" class="d-flex justify-content-center">
                                            <img src="assets/img/brand-logo/16.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  logo section end-->

    <!--custom product area start-->

    <?php include 'footer.php'; ?>



    <!--footer area end-->



    <!-- JS
============================================ -->
    <!--jquery min js-->
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <!--popper min js-->
    <script src="assets/js/popper.js"></script>
    <!--bootstrap min js-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--owl carousel min js-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--slick min js-->
    <script src="assets/js/slick.min.js"></script>
    <!--magnific popup min js-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--counterup min js-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!--jquery countdown min js-->
    <script src="assets/js/jquery.countdown.js"></script>
    <!--jquery ui min js-->
    <script src="assets/js/jquery.ui.js"></script>
    <!--jquery elevatezoom min js-->
    <script src="assets/js/jquery.elevatezoom.js"></script>
    <!--isotope packaged min js-->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!--slinky menu js-->
    <script src="assets/js/slinky.menu.js"></script>
    <!--instagramfeed menu js-->
    <script src="assets/js/jquery.instagramFeed.min.js"></script>
    <!-- tippy bundle umd js -->
    <script src="assets/js/tippy-bundle.umd.js"></script>
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>



</body>



</html>