<?php session_start();?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User - Question details</title>
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
                        <h3>Question Details</h3>
                       
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
     <?php
                            $result = mysqli_query($conn,"select * from questions where question_id='".$_GET["id"]."'") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
    <!--blog body area start-->
    <div class="blog_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper blog_wrapper_details">
                        <article class="single_blog">
                            <figure>
                               <div class="post_header">
                                   <h3 class="post_title"><?php echo $row["question"]; ?></h3>
                                    <div class="blog_meta">   
                                       <p><?php echo date('d-m-Y',strtotime($row["question_date_time"])); ?> </p>                                     
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                   <a href="#"><img src="../admin/uploads/questions/<?php echo $row["question_img"]; ?>" alt=""></a>
                               </div>
                            
                            </figure>
                        </article>
                        
                        <div class="comments_box">
                            <?php
                            $result1 = mysqli_query($conn,"select * from answers as a left join farmers as f on f.farmers_id=a.farmers_id where question_id='".$_GET["id"]."' and answers_approve='Yes'") or die(mysqli_error($conn));
                          while($row1=mysqli_fetch_assoc($result1))
                          {
                          ?>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#"><?php echo $row1["name"]; ?></a></h5>
                                        <span><?php echo date('d-m-Y',strtotime($row1["answers_date_time"])); ?> </span> 
                                    </div>
                                    <p><?php echo $row1["answers_text"]; ?></p>
                                    
                                </div>

                            </div>
                            <?php } ?>

                        </div>
                     <div class="comments_form">

            <?php
              if(isset($_POST["btnsubmit"]))
              {
                  $answertext= $_POST["txtcomment"];
                 

                  //abc.jpg
                  $img = $_FILES["txtimg"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename = time().".".$ext;//723564672.jpg
                  move_uploaded_file($_FILES["txtimg"]["tmp_name"], "../admin/uploads/answer/".$filename);




                  $result = mysqli_query($conn,"insert into answers (answers_text,answers_img) values ('$answertext','$filename')") or die(mysqli_error($conn));

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

                            <h3>Leave a Reply </h3>
                            <p>Your Answer *</p>
                            <form method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="review_comment">Answer </label>
                                        <textarea name="txtcomment" id="txtcomment" ></textarea>
                                    </div> 
                                    <div class="col-lg-4 col-md-4">
                                        <p>   
                                            <label>Answer Image<span>*</span></label>
                                            <input type="file" name="txtimg">
                                       </p>
                                    </div> 
                                   
                                </div>
                                <button class="btn btn-primary" type="submit" name="btnsubmit">Submit</button>
                             </form>    
                        </div>
                    </div>
                    <!--blog grid area start-->
                </div>
               
            </div>
        </div>
    </div>

<?php } ?>
    <!--blog section area end-->

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