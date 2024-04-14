<?php session_start();?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact page</title>
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
                       <h3>Contact Us</h3>
                        
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--contact map start-->
    <div class="contact_map mt-70">
       <div class="map-area">
          <iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.6820644889326!2d72.83767691416064!3d21.20478538712331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04fb2a64a922f%3A0xf5c5fbd871f68587!2sSurat%20station!5e0!3m2!1sen!2sin!4v1635326788662!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
       </div>
    </div>
   
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="contact_message content">
                        <h3>contact us</h3>    
                         <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : Shree Ram Krishna Niwas, Phadke Road, Dombivli (east),Mumbai</li>
                            <li><i class="fa fa-phone"></i> <a href="#">Ram@gmail.com</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">9756482658</a>  </li>
                        </ul>             
                    </div> 
                </div>
                
              <?php
              if(isset($_POST["btnsubmit"]))
              {
                //   $inq_id= $_POST["txtinquiryno"];
                  $name= $_POST["txtname"];
                  $contact= $_POST["txtcotact"];
                  $email= $_POST["txtemail"];
                  $message= $_POST["txtmessage"];

                  
                  $result = mysqli_query($conn,"insert into tbl_inquiry (name,contact,email,message) values (' $name','$contact','$email','$message')") or die(mysqli_error($conn));

                  if($result==true)
                  {
                    ?>

                <div class="alert m-3 alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Success!</h5>
                  Data Inserted!
                </div>
                    <?php
                  }
                  else
                 {
                    ?>
 <div class="alert m-3 alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i> Error!</h5>
                  Error!
                </div>

                    <?php
                  }
              }
              ?>
        

                <div class="col-lg-6 col-md-6">
                   <div class="contact_message form">
                        <h3>Tell us your project</h3>   
                        <form method="post" enctype="multipart/form-data">
                            <!-- <p>  
                               <label>Inquiry No</label>
                                <input name="txtinquiryno" placeholder="User id Number" type="text"> 
                            </p> -->
                            <p>       
                               <label>Name</label>
                                <input name="txtname" type="text" pattern="[A-Za-z '-]{1,50}" required placeholder="User Name" type="text">
                            </p>
                            <p>       
                               <label>Contact No</label>
                                <input type="tel" placeholder="0123456789" pattern="[0-9]{10}" required Format: 0123456789 maxlength="10" name="txtcotact" placeholder="Mobile Number" type="text">
                            </p>
                            <p>          
                               <label>Email Id</label>
                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required name="txtemail" placeholder="Emil" type="text">
                            </p>   
                            <p>          
                               <label>Message</label>
                                <input type="text" pattern="[A-Za-z '-]{1,50}" required name="txtmessage" placeholder="Message" type="text">
                            </p>    
                           
                            <button type="submit" name="btnsubmit">Send</button>
                            <button type="reset" class="btn btn-danger">Reset</button> 
                            <p class="form-messege"></p>
                        </form> 

                    </div> 
                </div>
            </div>
        </div>    
    </div>

    <!--contact area end-->

    <!--footer area start-->
    <?php include 'footer.php'; ?>
    <!--footer area end-->



<!-- JS
============================================ -->

<!--map js code here-->
<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>
<script  src="https://www.google.com/jsapi"></script>
<script src="assets/js/map.js"></script>

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