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
  <title>Farmer Project - Add Product</title>

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
            <h1>Manage Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">product Form</li>
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
            <a href="viewnews.php" class="btn btn-primary btn-sm">View Product</a>
          </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->

              <?php
              if(isset($_POST["btnsubmit"]))
              {
                $id = $_GET['id'];
                $productname= $_POST["txtproductname"];
                $productprice= $_POST["txtproductprice"];

                if(empty($_FILES['txtproductimg1']['name']))
                  {
                    $filename1=$_POST['oldimage'];
                  }
                  else
                  {
                    $img = $_FILES["txtproductimg1"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename1 = time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtproductimg1"]["tmp_name"], "uploads/product/".$filename1);
                  }

                  if(empty($_FILES['txtproductimg2']['name']))
                  {
                    $filename2=$_POST['oldimage'];
                  }
                  else
                  {
                     $img = $_FILES["txtproductimg2"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename2 = time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtproductimg2"]["tmp_name"], "uploads/product/".$filename2);
                  }

                  if(empty($_FILES['txtproductimg3']['name']))
                  {
                    $filename3=$_POST['oldimage'];
                  }

                  else
                  {

                      $img = $_FILES["txtproductimg3"]["name"];
                      $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                      $filename3 = time().".".$ext;//723564672.jpg
                      move_uploaded_file($_FILES["txtproductimg3"]["tmp_name"], "uploads/product/".$filename3);
                  }


                

                 
                  

                $productdescription= $_POST["txtproductdescription"];
                $productspecification= $_POST["txtproductspecification"];
                $productvideourl= $_POST["txtproductvideourl"];
                $catid = $_POST["txtcatid"];

                

                  $result = mysqli_query($conn,"update products set product_name='$productname',price='$productprice',img1='$filename1',img2='$filename2',img3='$filename3',description='$productdescription',specification='$productspecification',product_video_url='$productvideourl',cat_id='$catid'") or die(mysqli_error($conn));

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
                $result = mysqli_query($conn,"select * from products where product_id='$id'");
                while($row=mysqli_fetch_assoc($result))
                {
              ?>
              <!-- form start -->
              <form id="form1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="txtcatid">Category Names</label>
                    <select class="form-control" id="txtcatid" name="txtcatid">
                      <?php
                      $result1 = mysqli_query($conn,"select * from category") or die(mysqli_error($conn));
                      while($row1=mysqli_fetch_assoc($result1))
                      {
                      ?>
                        <option value="<?php echo $row1["category_id"]; ?>"><?php echo $row1["category_name"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="txtproductname">Product Name</label>
                    <input type="text" name="txtproductname" class="form-control" id="txtproductname" value="<?php echo $row["product_name"] ?>">
                  </div>
                  <div class="form-group">
                    <label for="txtproductprice">Product Price</label>
                    <input type="text" name="txtproductprice" class="form-control" id="txtproductprice" value="<?php echo $row["price"] ?>">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputFile">Product Image - 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtproductimg1" id="txtproductimg1">
                        <input type="hidden" name="oldimage" value="<?php echo $row["img1"]; ?>">
                        <label class="custom-file-label" for="txtproductimg1">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Product Image - 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtproductimg2" id="txtproductimg2">
                        <input type="hidden" name="oldimage" value="<?php echo $row["img2"]; ?>">
                        <label class="custom-file-label" for="txtproductimg2">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Product Image - 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtproductimg3" id="txtproductimg3">
                        <input type="hidden" name="oldimage" value="<?php echo $row["img3"]; ?>">
                        <label class="custom-file-label" for="txtproductimg3">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>





                  <div class="form-group">
                    <label for="txtproductdescription">Product Description</label>
                    <textarea class="form-control" name="txtproductdescription" id="txtproductdescription"><?php echo $row["description"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtproductspecification">Product Specification</label>
                    <textarea class="form-control" name="txtproductspecification" id="txtproductspecification"><?php echo $row["specification"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtproductvideourl">Category Video url</label>
                    <input type="text" name="txtproductvideourl" class="form-control" id="txtproductvideourl" value="<?php echo $row["product_video_url"] ?>">
                  </div>
                    <div>
                    <img src="../admin/uploads/product/<?php echo $row["img1"]; ?>" height="30%" width="30%">
                  </div>
                  <div>
                    <img src="../admin/uploads/product/<?php echo $row["img2"]; ?>" height="30%" width="30%">
                  </div>
                  <div>
                    <img src="../admin/uploads/product/<?php echo $row["img3"]; ?>" height="30%" width="30%">
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
<script src="dist/js/demo.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
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
      txtcatid:
      {
        required:true
      },
      txtproductname:
      {
        required:true
      },
      txtproductprice:
      {
        required:true
      },
      txtproductimg1:
      {
        required:true
      },
      txtproductimg2:
      {
        required:true
      },
      txtproductimg3:
      {
        required:true
      },
      txtproductdescription:
      {
        required:true
      },
      txtproductspecification:
      {
        required:true
      },
      txtproductvideourl:
      {
        required:true
      }
    }
  });
});
</script>
</body>
</html>
