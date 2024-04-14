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
  <title>Farmer Project - Change Password</title>

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
            <h1>Manage Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->

             <?php
                       
                        if(isset($_POST["btnsave"]))
                        {
                            $oldpassword=$_POST["oldpassword"];
                            $newpassword=$_POST["newpassword"];
                            $confirmpassword=$_POST["confirmpassword"];
                            $userid=$_SESSION["seller_id"];

                            if($newpassword == $confirmpassword)
                            {
                                $result = mysqli_query($conn,"select * from tbl_seller where seller_id='$userid' and password='$oldpassword'");
                                if(mysqli_num_rows($result)<=0)
                                {
                                    echo "Old Password Not Match";
                                }
                                else
                                {
                                    mysqli_query($conn,"update tbl_seller set password='$newpassword' where seller_id='$userid'");
                                    echo "Password Changed";
                                }
                            }
                            else
                            {
                                echo "Password Not Match";
                            }
                        }
                        ?>




              <!-- form start -->
              <form id="form1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="txtnewstitle">Old Password</label>
                    <input type="password" name="oldpassword" class="form-control" id="oldpassword" >
                  </div>

                  <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" name="newpassword" class="form-control" id="newpassword" >
                  </div>

                  <div class="form-group">
                    <label for="confirmpassword">Conform password</label>
                    <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" >
                  </div>

                  
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btnsave" class="btn btn-primary">Change Password</button>
                </div>
                   
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
$(function () {
  bsCustomFileInput.init();

  $("#form1").validate({
    rules:
    {
      txtnewstitle:
      {
        required:true
      },
      txtnewsdescription:
      {
        required:true
      },
      txtnewsimg:
      {
        required:true
      }
    }
  });


});
</script>
</body>
</html>
