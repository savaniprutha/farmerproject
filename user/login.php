f<?php session_start(); ?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Farmer Project - login</title>
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
                       <h3>Login</h3>
                        
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!-- customer login start -->
    <?php

      if(isset($_POST["btnlogin"]))
      {
        $useremail = $_POST["txtemailid"];
        $password = $_POST["txtpassword"];

        $result = mysqli_query($conn,"select * from farmers where email_id='$useremail' and password='$password'") or die(mysqli_error($conn));


        if(mysqli_num_rows($result)<=0)
        {
          echo "Lodin failed";
            
        }
        else
        {
         $_SESSION["isuserlogin"]="yes";
          $result = mysqli_query($conn,"select * from farmers where email_id='$useremail' and password='$password'") or die(mysqli_error($conn));
         while($row=mysqli_fetch_assoc($result))
         {
             $_SESSION["userid"]=$row["farmers_id"];
             $_SESSION["name"]=$row["name"];
         }
         echo "<script>window.location='index.php';</script>";
        }

      }
      ?>
    

    
    <div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form method="post">
                            <p>   
                                <label>email <span>*</span></label>
                                <input style="border:2px solid #198754;border-radius:60px" type="text" name="txtemailid" class="form-control">
                             </p>
                             <p>   
                                <label>Passwords <span>*</span></label>
                                <input style="border:2px solid #198754;border-radius:60px" type="password" name="txtpassword" class="form-control">
                             </p>   
                            <div class="login_submit">
                               <a href="#">Forgot password?</a>
                                <button style="border:2px solid #198754;border-radius:60px" type="submit" name="btnlogin" value="btnlogin">login</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

           




                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                             <?php
              if(isset($_POST["btnsubmit"]))
              {
                  $name = $_POST["txtfarmername"];
                  $mobile_no = $_POST["txtmobileno"];
                  $emailid = $_POST["txtemailid"];
                  $password = $_POST["txtpassword"];
                  $gender = $_POST["txtgender"];

                  $img = $_FILES["txtphoto"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename1 = time().".".$ext;//723564672.jpg
                  move_uploaded_file($_FILES["txtphoto"]["tmp_name"], "../admin/uploads/farmers/".$filename1);

                  


                  
                  //$ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  //$filename = time().".".$ext;//723564672.jpg
                  //move_uploaded_file($_FILES["txtcatimg"]["tmp_name"], "uploads/category/".$filename);


                  $result = mysqli_query($conn,"insert into farmers(name,mobile_no,email_id,password,gender,photo) values ('$name','$mobile_no','$emailid','$password','$gender','$filename1')") or die(mysqli_error($conn));

                  if($result==true)
                      {

                    echo "registered";
                  }
                  else
                  {
                   echo "error";
                  }
                  
                    
            }
            ?>
                        <form method="post" enctype="multipart/form-data">
                            <p>   
                                <label>Farmer name<span>*</span></label>
                                <input style="border:2px solid #198754;border-radius:60px" type="text" name="txtfarmername" id="txtfarmername" >
                             </p>
                             <p>   
                                <label>Mobile No<span>*</span></label>
                                <input style="border:2px solid #198754;border-radius:60px" type="number" name="txtmobileno" maxlength="10" id="txtmobileno" pattern="[0-9]{10}" required>
                             </p>
                             <p>   
                                <label>Email Id<span>*</span></label>
                                <input style="border:2px solid #198754;border-radius:60px" type="text" name="txtemailid" id="txtemailid">
                             </p>
                             <p>   
                                <label>Password<span>*</span></label>
                                <input style="border:2px solid #198754;border-radius:60px" type="password" name="txtpassword" id="txtpassword">
                             </p>
                             <p>   
                                <label>Gender<span>*</span></label>
                                
                                <input style =" height:30px " type="radio" name="txtgender" checked="" value="male" >Male
                                <input style =" height:30px " type="radio" name="txtgender" value="female">Female
                             </p>
                    
                             <p>   
                                <label>Photo<span>*</span></label>
                                <input  type="file" name="txtphoto" id="txtphoto">
                             </p>
                            <div class="login_submit">
                                <button style="border:2px solid #198754;border-radius:60px" type="submit" name="btnsubmit" id="btnsubmit">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->

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