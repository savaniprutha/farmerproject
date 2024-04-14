<?php session_start(); ?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/safira/safira/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 11:50:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout page</title>
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
    <!-- <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>Checkout</h3>
                        <ul>
                            <li><a href="index-2.html">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div> -->
    <!--breadcrumbs area end-->
    
    <!--Checkout page section-->
    <div class="Checkout_section mt-70">
       <div class="container">
            <div class="row">
               
            </div>
            <form method="post">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                       
                            <h3>Delivery Details</h3>
                            <div class="row">

                                <div class="col-lg-12 mb-20">
                                    <label>Name <span>*</span></label>
                                    <input type="text" name="txtname" value="<?php echo $_SESSION['name'] ?>">    
                                </div>
                                
                              

                                <div class="col-12 mb-20">
                                    <label>Address Line 1  <span>*</span></label>
                                    <input placeholder="House number and street name" name="txtaddline1" type="text">     
                                </div>
                                 <div class="col-12 mb-20">
                                    <label>Address Line 2  <span>*</span></label>
                                    <input placeholder="House number and street name" name="txtaddline2" type="text">     
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Landmark / Town / City <span>*</span></label>
                                    <input  type="text" name="txtlandmark">    
                                </div> 
                               
                                <div class="col-lg-6 mb-20">
                                    <label>Pincode<span>*</span></label>
                                    <input type="text" name="txtpincode"> 
                                </div> 
                                 <div class="col-lg-6 mb-20">
                                    <label> Phone   <span>*</span></label>
                                      <input type="text" name="txtphoneno"> 
                                </div> 
                               
                                  	    	    	    	    	    	    
                            </div>
                       
                    </div>
                    <div class="col-lg-6 col-md-6">
                       
                            <h3>Your order</h3> 
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
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
                                            <td> <?php echo $row["product_name"]; ?> <strong> × <?php echo $row["qty"]; ?></strong></td>
                                            <td> ₹ <?php echo $row["price"]*$row["qty"]; ?></td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        
                                      
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <input type="hidden" name="txttotal" value="<?php echo $total; ?>"/>
                                            <td><strong>₹ <?php echo $total; ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>     
                            </div>
                            <div class="payment_method">
                               <div class="panel-default">
                                    <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                    <a href="#method" data-bs-toggle="collapse" aria-controls="method">Cash on delivery</a>   
                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div> 
                               <div class="panel-default">
                                    <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                    <a href="https://checkout.razorpay.com/v1/checkout.js" data-bs-toggle="collapse" aria-controls="collapsedefult">Pay Online</a>   
                                    <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="order_button mt-3">
                                    <button name="btnconfirm" type="submit">Confirm</button> 
                                    <button id="rzp-button1">Pay</button>

                                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                            <script>
                                            var options = {
                                                "key": "rzp_test_fK7Xp72IJhzNBa", // Enter the Key ID generated from the Dashboard
                                                "amount":"50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                                "currency": "INR",
                                                "name": "Acme Corp", //your business name
                                                "description": "Test Transaction",
                                                "image": "https://example.com/your_logo",
                                                // "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                                // "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                                                "handler": function (response){
                                                    consol.log(response);
                                                }
                                                // "prefill": {
                                                //     "name": "Gaurav Kumar", //your customer's name
                                                //     "email": "gaurav.kumar@example.com",
                                                //     "contact": "9000090000"
                                                // },
                                                // "notes": {
                                                //     "address": "Razorpay Corporate Office"
                                                // },
                                                // "theme": {
                                                //     "color": "#3399cc"
                                                // }
                                            };
                                            var rzp1 = new Razorpay(options);
                                            document.getElementById('rzp-button1').onclick = function(e){
                                                rzp1.open();
                                                e.preventDefault();
                                            }
                                            </script>
                                </div>    
                            </div> 
                            
                    </div>
                </div> 
            </div> 
        </form>
        </div>       
    </div>
    <!--Checkout page section end-->


    <?php

     if(isset($_POST["btnconfirm"]))
              {
                  $userid=$_SESSION['userid'];
                  $addressline1 = $_POST["txtaddline1"];
                  $addressline2 = $_POST["txtaddline2"];
                  $landmark = $_POST["txtlandmark"];
                  $pincode = $_POST["txtpincode"];
                  $phone = $_POST["txtphoneno"];
                   $txttotal = $_POST["txttotal"];

                  $sql = mysqli_query($conn,"insert into orders(farmers_id,addline_1,addline_2,landmask,pincode,orders_mobile_no,total_payment) values ('$userid','$addressline1',' $addressline2 ','$landmark','$pincode ','$phone','$txttotal')") or die(mysqli_error($conn));

                  $orderid=mysqli_insert_id($conn);

                  $result = mysqli_query($conn,"select * from cart as c left join products as p on p.product_id=c.product_id where c.farmers_id='$userid'") or die(mysqli_error($conn));
                $total=0;
                while($row=mysqli_fetch_assoc($result))
                {
                    $pid=$row["product_id"];
                    $qty=$row["qty"];
                    mysqli_query($conn,"insert into items (orders_id,product_id,qty) values ('$orderid','$pid','$qty')");
                }
                 $result = mysqli_query($conn,"delete from cart where farmers_id='$userid'") or die(mysqli_error($conn));

                  echo "<script>window.location='myaccount.php';</script>";
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