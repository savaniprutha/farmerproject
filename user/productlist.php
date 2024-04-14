<?php session_start(); ?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product List</title>
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
                        <h3>Products</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">


                            <div class="widget_list widget_color">
                                <h3>Select By Category</h3>
                                <ul>
                                    <li>
                                        <a href="productlist.php">All Products</a>
                                    </li>
                                    <?php
                                    $result = mysqli_query($conn, "select *,(select count(*) from products where cat_id=category.category_id) as totalproducts from category") or die (mysqli_error($conn));
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                    <li>
                                        <a href="productlist.php?catid=<?php echo $row["category_id"]; ?>">
                                            <?php echo $row["category_name"]; ?>
                                            <span>(
                                                <?php echo $row["totalproducts"]; ?>)
                                            </span>
                                        </a>
                                    </li>

                                    <?php } ?>

                                </ul>
                            </div>

                            <div class="widget_list banner_widget">
                                <div class="banner_thumb">
                                    <a href="#"><img src="assets/img/bg/banner17.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                                title="3"></button>

                            <!-- <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button> -->

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                                title="List"></button>
                        </div>

                        <div class="page_amount">
                            <p>Total Products :

                                <?php
                                if (isset ($_GET["catid"])) {
                                    $catid = $_GET["catid"];
                                    $result = mysqli_query($conn, "select p.*,c.* from products as p left join category as c on c.category_id = p.cat_id where p.cat_id='$catid'") or die (mysqli_error($conn));
                                } else if (isset ($_GET["search"])) {
                                    $result = mysqli_query($conn, "select p.*,c.* from products as p left join category as c on c.category_id = p.cat_id where product_name like '%" . $_GET["search"] . "%'") or die (mysqli_error($conn));
                                } else {
                                    $result = mysqli_query($conn, "select p.*,c.* from products as p left join category as c on c.category_id = p.cat_id") or die (mysqli_error($conn));
                                }
                                echo mysqli_num_rows($result);
                                ?>
                            </p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper">

                        <?php
                        if (isset ($_GET["catid"])) {
                            $catid = $_GET["catid"];
                            $result = mysqli_query($conn, "select p.*,c.* from products as p left join category as c on c.category_id = p.cat_id where p.cat_id='$catid'") or die (mysqli_error($conn));
                        } else if (isset ($_GET["search"])) {
                            $search = $_GET["search"];
                            $result = mysqli_query($conn, "select p.*,c.* from products as p left join category as c on c.category_id = p.cat_id where product_name like '$search%'") or die (mysqli_error($conn));
                        } else {
                            $result = mysqli_query($conn, "select p.*,c.* from products as p left join category as c on c.category_id = p.cat_id") or die (mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="single_product">
                                <!-- <div class="product_thumb"> -->


                                <!-- <div class="topbar"> -->
                                <div style="height: 300px;">
                                    <a class="secondary_img"
                                        href="product_details.php?id=<?php echo $row["product_id"]; ?>"><img
                                            src="<?php echo "assets/img/product/" . $row['img1']; ?>" width="250"
                                            heigth="250" alt="Product Img"></a>
                                </div>

                                <div class="action_links">
                                    <ul>

                                        <li class="quick_button"><a href="#" data-tippy="quick view"
                                                data-tippy-placement="top" data-tippy-arrow="true"
                                                data-tippy-inertia="true" data-bs-toggle="modal"
                                                data-bs-target="#modal_box<?php echo $row["product_id"]; ?>"> <span
                                                    class="lnr lnr-magnifier"></span></a></li>

                                    </ul>
                                </div>
                                <!-- </div> -->
                                <div class="product_content grid_content">
                                    <h4 class="product_name"><a href="#">
                                            <?php echo $row["product_name"]; ?>
                                        </a></h4>
                                    <p><a href="#">
                                            <?php echo $row["category_name"]; ?>
                                        </a></p>
                                    <div class="price_box">
                                        <span class="current_price">₹
                                            <?php echo $row["price"]; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <h4 class="product_name"><a href="#">
                                            <?php echo $row["product_name"]; ?>
                                        </a></h4>
                                    <p><a href="#">
                                            <?php echo $row["category_name"]; ?>
                                        </a></p>
                                    <div class="price_box">
                                        <span class="current_price">₹
                                            <?php echo $row["price"]; ?>
                                        </span>
                                    </div>
                                    <div class="product_desc">
                                        <p>
                                            <?php echo $row["description"]; ?>
                                        </p>
                                    </div>
                                    <div class="action_links list_action_right">
                                        <ul>

                                            <li class="quick_button"><a href="#" data-tippy="quick view"
                                                    data-tippy-placement="top" data-tippy-arrow="true"
                                                    data-tippy-inertia="true" data-bs-toggle="modal"
                                                    data-bs-target="#modal_box<?php echo $row["product_id"]; ?>"> <span
                                                        class="lnr lnr-magnifier"></span></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="modal_box<?php echo $row["product_id"]; ?>" tabindex="-1"
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
                                                                            alt="" hight=400 width=400></a>
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
                                                                    <button name="btncart" type="submit">add to
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
                                                            <!-- <p><a href="product_details.php"> <u><b> READ
                                                                            MORE</b></u></a> </p> -->
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
                        </div>



                        <?php } ?>
                    </div>
                    <!-- 
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->



    <?php
    if (isset ($_POST["btncart"])) {
        $pid = $_POST["txtpid"];
        $qty = $_POST["txtqty"];
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


    <!--footer area start-->
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