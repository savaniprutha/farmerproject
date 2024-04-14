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
  <title>Farmer Project - Add News</title>

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
            <h1>Manage News</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">News Form</li>
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
            <a href="viewnews.php" class="btn btn-primary btn-sm">View News</a>
          </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add News</h3>
              </div>
              <!-- /.card-header -->
              <?php
              if(isset($_POST["btnsubmit"]))
              {
                $id = $_GET['id'];
                  $newstitle= $_POST["txtnewstitle"];
                  $newsdescription= $_POST["txtnewsdescription"];

                  //FileUpload
                  if(empty($_FILES['txtnewsimg']['name']))
                  {
                    $filename=$_POST['oldimage'];
                  }
                  else
                  {
                    //abc.jpg
                    $img = $_FILES["txtnewsimg"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename = time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtnewsimg"]["tmp_name"], "uploads/news/".$filename);
                  }

                  $result = mysqli_query($conn,"update news set news_title='$newstitle',description='$newsdescription',img='$filename' where news_id='$id'") or die(mysqli_error($conn));

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
                $result = mysqli_query($conn,"select * from news where news_id='$id'");
                while($row=mysqli_fetch_assoc($result))
                {
              ?>
              <!-- form start -->
              <form id="form1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="txtnewstitle">News Title</label>
                    <input type="text" name="txtnewstitle" class="form-control" id="txtnewstitle" value="<?php echo $row["news_title"] ?>">
                  </div>
                  <div class="form-group">
                    <label for="txtnewsdescription">Description</label>
                    <textarea class="form-control" name="txtnewsdescription" id="txtnewsdescription"><?php echo $row["description"] ?>
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">News Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtnewsimg" id="txtnewsimg">
                        <input type="hidden" name="oldimage" value="<?php echo $row["img"]; ?>">
                        <label class="custom-file-label" for="txtnewsimg">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <img src="../admin/uploads/news/<?php echo $row["img"]; ?>" height="50%" width="50%">
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
            

          </div>
         
          <div class="col-md-6">
            
           

           
            
           
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

<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/demo.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
<!-- Page specific script -->

</body>
</html>
