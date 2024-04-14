<?php session_start(); ?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cart page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
                        <h3>Cart</h3>
                        <ul>
                            <li><a href="index-2.html">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-70">
        <div class="container">
            <form action="#" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Pack Size</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $userid=$_SESSION['userid'];

                                                $result = mysqli_query($conn,"select * from cart as c left join products as p on p.product_id=c.product_id where c.farmers_id='$userid'") or die(mysqli_error($conn));
                                                $total=0;
                                                while($row=mysqli_fetch_assoc($result))
                                                {

                                                    $total = $total + ($row["qty"]*$row["price"]);
                                ?>
                                        <tr>
                                            <td class="product_remove"><a
                                                    href="?cartid1=<?php echo $row["cartid"]; ?>"><i
                                                        class="fa fa-trash-o"></i></a></td>
                                            <td class="product_thumb"><a href="#"><img
                                                        src="../user/assets/img/product/<?php echo $row["img1"]; ?>"
                                                        alt=""></a></td>
                                            <td class="product_name"><a href="#"><?php echo $row["product_name"]; ?></a>
                                            </td>
                                            <td class="product-price">₹ <?php echo $row["price"]; ?></td>
                                            <td class="product_quantity">
                                                <!-- <label>Pack Size</label>  -->
                                                <input name="<?php echo $row["cartid"]; ?>" min="1" max="10"
                                                    value="<?php echo $row["qty"]; ?>" type="number">
                                            </td>
                                            <td class="product_total">₹ <?php echo $row["price"]*$row["qty"]; ?></td>


                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button name="update_cart" type="submit">update cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">

                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount">₹ <?php echo $total; ?></p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="checkout.php">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
    <!--shopping cart area end -->

    <?php
    if(isset($_GET["cartid1"]))
   {
    $cartid=$_GET["cartid1"];
     $result = mysqli_query($conn,"delete from cart where cartid='$cartid'") or die(mysqli_error($conn));
      echo "<script>window.location='cart.php';</script>";
   }

   if(isset($_POST["update_cart"]))
   {

    $userid=$_SESSION['userid'];

    $result = mysqli_query($conn,"SELECT * from cart WHERE farmers_id = '$userid'") or die(mysqli_error($conn));

    while($row=mysqli_fetch_assoc($result))
    {
        $cartID = $row['cartid'];
        $quantityID = $_POST[$cartID];
        $result1 = mysqli_query($conn,"UPDATE cart SET qty='$quantityID' WHERE cartid='$cartID'") or die(mysqli_error($conn));
        
         echo "<script>window.location='cart.php';</script>";
    }

    // echo "<script>console.log('this is a Variable: " . $result. "' );</script>"; 


    //    $userid=$_SESSION['userid'];


    //    $result=mysqli_query($conn,"select * from cart where product_id='$pid' and farmers_id='$userid'");
    //    if(mysqli_num_rows($result)<=0)
    //    {
    //        mysqli_query($conn,"insert into cart (product_id,farmers_id,qty) values ('$pid','$userid','$qty')");
    //    }
    //    else
    //    {
    //        mysqli_query($conn,"update cart set qty=qty+$qty where product_id='$pid' and farmers_id='$userid'");
    //    }
    //    echo "<script>window.location='cart.php';</script>";
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