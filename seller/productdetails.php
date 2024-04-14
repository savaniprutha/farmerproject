<?php
session_start();
if(!isset($_SESSION['islogin']))
{
  echo "<script>window.location='index.php';</script>";
}

?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <?php include 'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">

            <!-- Profile Image -->
            <!-- <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               
                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
              </div>
            </div> -->
            <!-- /.card -->

            <!-- About Me Box -->
            <?php
              $id=$_GET["id"];
            $result = mysqli_query($conn,"select p.*,c.* from products as p left join category as c on c.category_id = p.cat_id where p.product_id='$id'") or die(mysqli_error($conn));
            while($row=mysqli_fetch_assoc($result))
            {
            ?>

            <div class="card card-primary">
             
              <!-- /.card-header -->
              <div class="card-body">
                <strong>Product Name</strong>

                <p class="text-muted">
                  <?php echo $row["product_name"]; ?>
                </p>

                <hr>

                <strong>Category</strong>

                <p class="text-muted">
                 <?php echo $row["category_name"]; ?>
                </p>

                <hr>


                <strong>Product Price</strong>

                <p class="text-muted">
                  <?php echo $row["price"]; ?>
                </p>

                <hr>


                   <strong>Product Img-1</strong>

                <p class="text-muted">
                  <?php echo $row["img1"]; ?>
                </p>

                <hr>


                   <strong>Product Img-2</strong>

                <p class="text-muted">
                  <?php echo $row["img2"]; ?>
                </p>

                <hr>


                   <strong>Product Img-3</strong>

                <p class="text-muted">
                  <?php echo $row["img3"]; ?>
                </p>

                <hr>

                   <strong>Product date/time</strong>

                <p class="text-muted">
                  <?php echo $row["product_added_date"]; ?>
                </p>

                <hr>

                   <strong>Product Description</strong>

                <p class="text-muted">
                  <?php echo $row["description"]; ?>
                </p>

                <hr>



                   <strong>Product Specification</strong>

                <p class="text-muted">
                  <?php echo $row["specification"]; ?>
                </p>

                <hr>


                   <strong>Product Videourl</strong>

                <p class="text-muted">
                  <?php echo $row["product_video_url"]; ?>
                </p>

                <hr>

               
              </div>
              <!-- /.card-body -->
            </div>

            <?php } ?>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
