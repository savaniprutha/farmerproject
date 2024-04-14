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
  <title>Farmer Project - Add Subsidy</title>

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
            <h1>Manage Subsidy</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subsidy Form</li>
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
            <a href="viewnews.php" class="btn btn-primary btn-sm">View Subsidy</a>
          </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Subsidy</h3>
              </div>
              <!-- /.card-header -->

              <?php
              if(isset($_POST["btnsubmit"]))
              {
                  $title= $_POST["txtsubsidytitle"];
                  $description= $_POST["txtsubsidydescription"];


                  if(empty($_FILES['txtsubsidyimg']['name']))
                  {
                    $filename=$_POST['oldimage'];
                  }
                  else
                  {
                    //abc.jpg
                    $img = $_FILES["txtsubsidyimg"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename01= time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtsubsidyimg"]["tmp_name"], "uploads/subsidy/".$filename01);
                  }

                  if(empty($_FILES['txtsubsidypdf']['name']))
                  {
                    $filename=$_POST['oldimage'];
                  }
                  else
                  {
                    //abc.jpg
                    $img = $_FILES["txtsubsidyimg"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename2= time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtsubsidypdf"]["tmp_name"], "uploads/subsidy/".$filename2);
                  }

                  $subsidycontact= $_POST["txtcontactno"];

                  $subsidyaddress= $_POST["txtsubsidyaddress"];

                  $isactive= $_POST["txtsubsidyactive"];






                  $result = mysqli_query($conn,"update subsidi set title='$title',description='$description',image='$filename1',pdf_use='filename2',contact_no='$subsidycontact',address='$subsidyaddress',isactive='$isactive'") or die(mysqli_error($conn));

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

              <?php
                $id = $_GET['id'];
                $result = mysqli_query($conn,"select * from subsidi where sub_id='$id'");
                while($row=mysqli_fetch_assoc($result))
                {
              ?>




              <!-- form start -->
              <form id="form1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="txtsubsidytitle">Subsidy Title</label>
                    <input type="txtsubsidytitle" name="txtsubsidytitle" class="form-control" id="txtsubsidytitle" value="<?php echo $row["title"] ?>">
                  </div>
                  <div class="form-group">
                    <label for="txtsubsidydescription">Description</label>
                    <textarea class="form-control" name="txtsubsidydescription" id="txtsubsidydescription"><?php echo $row["web_site"] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Subsidy Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtsubsidyimg" id="txtsubsidyimg">
                        <label class="custom-file-label" for="txtsubsidyimg">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Pdf Use</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtsubsidypdf" id="txtsubsidypdf">
                        <label class="custom-file-label" for="txtsubsidypdf">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="txtcontactno">Contact No</label>
                    <textarea class="form-control" name="txtcontactno" id="txtcontactno"></textarea>
                  </div>

                   <div class="form-group">
                    <label for="txtsubsidyaddress">Address</label>
                    <textarea class="form-control" name="txtsubsidyaddress" id="txtsubsidyaddress"><?php echo $row["web_site"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsubsidyactive">Is Active</label>
                    <textarea class="form-control" name="txtsubsidyactive" id="txtsubsidyactive"><?php echo $row["web_site"] ?></textarea>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                   <button type="reset" class="btn btn-danger">Reset</button>
                </div>
              </form>
              <?php
                }
              ?>
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


</body>
</html>
