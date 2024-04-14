<?php session_start(); ?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../admin/uploads/logo/image.jpg">

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

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="productlist.php">Shop</a></li>
                            <li>product details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <?php
$productID = $_GET['id'];


$productData = mysqli_query(
$conn,
"SELECT p.*,c.category_name FROM products p LEFT JOIN category c ON c.category_id  = p.cat_id WHERE p.product_id = '$productID' "
) or die (mysqli_error($conn));

while ($row = mysqli_fetch_assoc($productData)) { 
    ?>

    <!--product details start-->
    <div class="product_details mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?php echo "assets/img/product/" . $row['img1']; ?>"
                                    data-zoom-image="<?php echo "assets/img/product/" . $row['img1']; ?>" hight=550
                                    width=560 alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="<?php echo "assets/img/product/" . $row['img2']; ?>"
                                        data-zoom-image="<?php echo "assets/img/product/" . $row['img2']; ?>">
                                        <img src="<?php echo "assets/img/product/" . $row['img2']; ?>" alt="zo-th-1" />
                                    </a>

                                </li>
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="<?php echo "assets/img/product/" . $row['img3']; ?>"
                                        data-zoom-image="<?php echo "assets/img/product/" . $row['img3']; ?>">
                                        <img src="<?php echo "assets/img/product/" . $row['img3']; ?>" alt="zo-th-1" />
                                    </a>

                                </li>
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="<?php echo "assets/img/product/" . $row['img1']; ?>"
                                        data-zoom-image="<?php echo "assets/img/product/" . $row['img1']; ?>">
                                        <img src="<?php echo "assets/img/product/" . $row['img1']; ?>" alt="zo-th-1" />
                                    </a>

                                </li>
                                <!-- <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="assets/img/product/p5.png"
                                        data-zoom-image="assets/img/product/p5.png">
                                        <img src="assets/img/product/p5.png" alt="zo-th-1" />
                                    </a>

                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="#" method="post">

                            <!-- <h1><a href="#">Tomato</a></h1> -->
                            <h1><a href="#"><?php echo $row['product_name'];?></a></h1>


                            <div class="price_box">
                                <span class="current_price">₹<?php echo  $row['price'];?></span>
                                <span class="old_price">₹<?php echo  $row['price'] + rand(50,100);?></span>

                            </div>
                            <div class="product_desc">
                                <p>
                                    <?php echo  $row['description'];?>
                            </div>

                            <div class="product_variant quantity">
                                <label>Pack Size</label>

                                <input min="1" name="qty" max="10" value="1" type="number">
                                <button class="button" name="btncart" type="submit">add to cart</button>

                            </div>

                            <div class="product_meta">
                                <span>Category: <?php echo $row['category_name'];?></span>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-65">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">Description</a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <?php echo  $row['specification'];?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <?php } ?>

    <!--product area start-->
    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php
                        $productID = $_GET['id'];

                        $catIdData = mysqli_query(
                            $conn,
                            "SELECT p.cat_id,c.category_name FROM products p LEFT JOIN category c ON c.category_id = p.cat_id WHERE p.product_id = '$productID' LIMIT 1 "
                        ) or die (mysqli_error($conn));
                        $catIdData = mysqli_fetch_assoc($catIdData);

                        $catID = $catIdData['cat_id'];

                        $productData = mysqli_query(
                            $conn,
                            "select * from products WHERE cat_id = '$catID' "
                        ) or die (mysqli_error($conn));


                        while ($row = mysqli_fetch_assoc($productData)) { ?>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product_details.php"><img
                                            src="<?php echo "assets/img/product/" . $row['img1']; ?>" alt=""></a>
                                    <a class="secondary_img"
                                        href="product_details.php?id=<?php echo $row["product_id"]; ?>"><img
                                            src="<?php echo "assets/img/product/" . $row['img2']; ?>" alt=""></a>

                                    <!-- <div class="action_links">
                                        <ul>

                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                    data-tippy-placement="top" data-tippy-arrow="true"
                                                    data-tippy-inertia="true" data-bs-toggle="modal"
                                                    data-bs-target="#modal_box<?php echo $row["product_id"]; ?>"> <span
                                                        class="lnr lnr-magnifier"></span></a></li>

                                        </ul>
                                    </div> -->
                                    <!-- <a href="product_details.php"></a> -->
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name">
                                        <?php echo $row['product_name']; ?>
                                    </h4>
                                    <label>
                                        <?php echo $catIdData['category_name']; ?>
                                    </label>
                                    <div class="price_box">
                                        <span class="current_price">₹
                                            <?php echo $row['price']; ?>
                                        </span>
                                        <span class="old_price">₹
                                            <?php echo $row['price'] + rand(50, 100); ?>
                                        </span>
                                    </div>
                                </figcaption>

                            </figure>
                        </article>



                        <!-- <div class="modal fade" id="modal_box<?php echo $row["product_id"]; ?>" tabindex="-1"
                            role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="icon-x"></i></span>
                                    </button>
                                    <div class="modal_body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-12">
                                                    <div class="modal_tab">
                                                        <div class="tab-content product-details-large">
                                                            <div class="tab-pane fade show active" id="tab1"
                                                                role="tabpanel">
                                                                <div class="modal_tab_img">
                                                                    <a href="#"><img
                                                                            src="assets/img/product/<?php echo $row['img1']; ?>"
                                                                            alt="" width="250" height="250"></a>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                                <div class="modal_tab_img">
                                                                    <a href="#"><img
                                                                            src="assets/img/product/<?php $row["img1"]; ?>"
                                                                            alt=""></a>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                                <div class="modal_tab_img">
                                                                    <a href="#"><img
                                                                            src="assets/img/product/<?php $row["img1"]; ?>"
                                                                            alt=""></a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-12">
                                                    <div class="modal_right">
                                                        <div class="modal_title mb-10">
                                                            <h2>
                                                                <?php echo $row["product_name"]; ?>
                                                            </h2>
                                                        </div>
                                                        <div class="modal_price mb-10">
                                                            <span class="new_price">₹
                                                                <?php echo $row["price"]; ?>
                                                            </span>
                                                        </div>
                                                        <div class="variants_selects">
                                                            <?php
                                                                if (isset ($_SESSION['isuserlogin'])) { ?>
                                                            <div class="modal_add_to_cart">
                                                                <form method="post">
                                                                    <input name="txtqty" min="1" max="100" value="1"
                                                                        type="number">
                                                                    <input name="txtpid"
                                                                        value="<?php echo $row["product_id"]; ?>"
                                                                        type="hidden">
                                                                    <button name="btncart" type="submit">add
                                                                        to
                                                                        cart</button>
                                                                </form>
                                                            </div>
                                                            <?php } else { ?>

                                                            <a class="btn btn-dark mb-3" href="login.php">Please Login
                                                                First for add to cart</a>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="modal_description mb-15">
                                                            <h4>Description</h4>
                                                            <p>
                                                                <?php echo $row["description"]; ?>
                                                            </p>
                                                            <p><a href="product_details.php"> <u><b> READ
                                                                            MORE</b></u></a> </p>
                                                        </div>
                                                        <div class="modal_description mb-15">
                                                            <h4>Specification</h4>
                                                            <p>
                                                                <?php echo $row["specification"]; ?>
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->

    <!--footer area start-->

    <?php
    if (isset ($_POST["btncart"])) {
        $pid = $_GET["id"];
        $qty = empty ($_POST["qty"]) ? 1 : $_POST["qty"];
        $userid = $_SESSION['userid'];
    
        $result = mysqli_query($conn, "select * from cart where product_id='$pid' and farmers_id='$userid'");
        if (mysqli_num_rows($result) <= 0) {
            mysqli_query($conn, "insert into cart (product_id,farmers_id,qty) values ('$pid','$userid','$qty')");
        } else {
            mysqli_query($conn, "update cart set qty=qty+$qty where product_id='$pid' and farmers_id='$userid'");
        }
        echo "<script>window.location='cart.php';</script>";
    }
    ?>


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