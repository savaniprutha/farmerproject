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
  <title>Farmer Project - Add City</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .error
    {
      color: red;
    }
  </style>
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
            <h1>Manage City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">City Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-12 text-right p-3">
            <a href="viewcity.php" class="btn btn-primary btn-sm">View City</a>
          </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add City</h3>
              </div>
              <!-- /.card-header -->

              <?php
              if(isset($_POST["btnsubmit"]))
              {
                  $state_id= $_POST["txtstateid"];
                  $city_name= $_POST["txtcityname"];

                  if( $state_id != "" && $city_name != ""){
                   $result = mysqli_query($conn,"insert into tbl_city (state_id,city_name) values ('$state_id','$city_name')") or die(mysqli_error($conn));

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
              }
              ?>




              <!-- form start -->
              <form id="form1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="txtstateid">State Name</label>
                    <select class="form-control" id="txtstateid" name="txtstateid" required>
                      <?php
                      $result = mysqli_query($conn,"select * from tbl_state") or die(mysqli_error($conn));
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                        <option value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                 

                  <div class="form-group">
                    <label for="txtcityname">City Name</label>
                    <textarea class="form-control" type="text" pattern="[A-Za-z '-]{1,50}" required name="txtcityname" id="txtcityname" required></textarea>
                  </div>

                   

                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                   <button type="reset" class="btn btn-danger">Reset</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            
           

           
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
<!-- Page specific script -->
<script>
// $(function () {
//   bsCustomFileInput.init();

//   $("#form1").validate({
//     rules:
//     {
//       txtnewstitle:
//       {
//         required:true
//       },
//       txtnewsdescription:
//       {
//         required:true
//       },
//       txtnewsimg:
//       {
//         required:true
//       }
//     }
//   });


// });
</script>
</body>
</html>
