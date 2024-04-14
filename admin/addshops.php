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
  <title>Farmer Project - Add Shops</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .error {color: #FF0000;}
    
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
            <h1>Manage Shops</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Shops</li>
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
            <a href="viewshops.php" class="btn btn-primary btn-sm">View Shops</a>
          </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Shops</h3>
              </div>
              <!-- /.card-header -->

              <?php
              if(isset($_POST["btnsubmit"]))
              {
                  $cityname= $_POST["txtcityid"];
                  $shopname= $_POST["txtshopname"];
                  $personname= $_POST["txtpersonname"];
                  $about= $_POST["txtshopabout"];
                  $contact_no= $_POST["txtshopcontactno"];
                  $email= $_POST["txtshopemail"];
                  $address= $_POST["txtshopaddress"];
                  $landmark= $_POST["txtshoplandmark"];
                  $pincode= $_POST["txtshoppincode"];
                  $late= $_POST["txtshoplat"];
                  $lng= $_POST["txtshoplng"];

                  $img = $_FILES["txtshopimageurl"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename1 = time().rand(1111,9999).".".$ext;//234732678624781234.jpg.jpg
                  move_uploaded_file($_FILES["txtshopimageurl"]["tmp_name"], "uploads/shops/".$filename1);

                  $is_block= $_POST["txtisblock"];

                  $shop_type= $_POST["txtshoptype"];

                
                  if( $shopname != "" && $personname != "" && $about != "" && $contact_no != "" && $email != "" && $address != "" && $landmark != "" && $pincode != "" && $late != "" && $lng != "" && $img != "" && $shop_type != "" ){

                  $result = mysqli_query($conn,"insert into tbl_shops (city_id,shop_name,person_name,about,contact,email,address,landmark,pincode,lat,lng,image_url,is_block,shop_type) values ( '$cityname', '$shopname','$personname','$about','$contact_no','$email','$address','$landmark','$pincode','$late','$lng','$filename1','$is_block','$shop_type')") or die(mysqli_error($conn));

                  if($result==true)
                  {
                    ?>

                <div class="alert m-3 alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
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
              <form id="form1" method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="card-body">

                 <div class="form-group">
                    <label for="txtcityid">City Name</label>
                    <select class="form-control" id="txtcityid" name="txtcityid">

                      <?php
                      $result1 = mysqli_query($conn,"select * from tbl_city") or die(mysqli_error($conn));
                      while($row1=mysqli_fetch_assoc($result1))
                      {
                      ?>
                        <option value="<?php echo $row1["city_id"]; ?>"><?php echo $row1["city_name"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="txtshopname">Shop Name</label>
                    <input type="txtshopname" name="txtshopname" class="form-control" id="txtshopname" required>
                    
                  </div>
                  <div class="form-group">
                    <label for="txtpersonname">Person Name</label>
                    <textarea class="form-control" name="txtpersonname" id="txtpersonname" required></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtshopabout">About</label>
                    <textarea class="form-control" name="txtshopabout" id="txtshopabout" required></textarea>
                  </div>

                   <div class="form-group">
                    <label for="txtshopcontactno">Contact No</label>
                    <textarea class="form-control" name="txtshopcontactno" id="txtshopcontactno" required></textarea>
                 </div>

                  <div class="form-group">
                    <label for="txtshopemail">Email</label>
                    <textarea class="form-control" name="txtshopemail" id="txtshopemail" required></textarea>
                 </div>

                 <div class="form-group">
                    <label for="txtshopaddress">Address</label>
                    <textarea class="form-control" name="txtshopaddress" id="txtshopaddress" required></textarea>
                 </div>

                 <div class="form-group">
                    <label for="txtshoplandmark">Landmark</label>
                    <textarea class="form-control" name="txtshoplandmark" id="txtshoplandmark" required></textarea>
                 </div>

                 <div class="form-group">
                    <label for="txtshoppincode">Pincode</label>
                    <textarea class="form-control" name="txtshoppincode" id="txtshoppincode" required></textarea>
                 </div>

                  <div class="form-group">
                    <label for="txtshoplat">Late Object Literal</label>
                    <textarea class="form-control" name="txtshoplat" id="txtshoplat" required></textarea>
                 </div>


                  <div class="form-group">
                    <label for="txtshoplng">Lng Object Literal</label>
                    <textarea class="form-control" name="txtshoplng" id="txtshoplng" required></textarea>
                 </div>




               

                  <div class="form-group">
                    <label for="exampleInputFile">Image Url</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtshopimageurl" id="txtshopimageurl">
                        <label class="custom-file-label" for="txtshopimageurl">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>


                   <div class="form-group">
                    <label for="txtisblock">Is Block</label>
                    <select class="form-control" id="txtisblock" name="txtisblock" required>
                      
                        <option value="<?php echo $row["is_block"] ?>">YES</option>
                        <option value="<?php echo $row["is_block"] ?>">No</option>
                      
                    </select>
                  </div>

                  


                   <div class="form-group">
                    <label for="txtshoptype">Shop Type</label>
                    <textarea class="form-control" name="txtshoptype" id="txtshoptype" required></textarea>
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
