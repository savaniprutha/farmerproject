<?php
session_start();
if(!isset($_SESSION['islogin']))
{
  echo "<script>window.location='login.php';</script>";
}
?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmer Project - Add Seller</title>

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

    /* .wrapper{
      margin-left : 0;

    } */
  </style>
</head>
<body > 
<!-- class="hold-transition sidebar-mini" -->
<div class="wrapper" width = "1500px" >
  <!-- Navbar -->
 <!-- php include 'header.php'; ?> -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- php include 'menu.php'; ?> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" width=1800px>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Seller</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subsidy Seller</li>
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
            <a href="viewseller.php" class="btn btn-primary btn-sm">View Seller</a>
          </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add seller</h3>
              </div>
              <!-- /.card-header -->

              <?php
              if(isset($_POST["btnsubmit"]))
              {
                  $sellername= $_POST["txtsellername"];
                  $shopname= $_POST["txtsellershopname"];
                  $contactnumber= $_POST["txtsellercontactnumber"];
                  $email_id= $_POST["txtselleremailid"];
                  $web_site= $_POST["txtsellerwebsite"];
                  $about= $_POST["txtsellerabout"];


                  $img = $_FILES["txtsellercertificateurl"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename004 = time().".".$ext;//723564672.jpg
                  move_uploaded_file($_FILES["txtsellercertificateurl"]["tmp_name"], "../admin/uploads/seller/".$filename004);


                  //abc.jpg
                  $img = $_FILES["txtsellerlogo"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename1 = time().".".$ext;//723564672.jpg
                  move_uploaded_file($_FILES["txtsellerlogo"]["tmp_name"], "../admin/uploads/seller/".$filename1);

                  $img = $_FILES["txtshopphoto"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename2 = time().".".$ext;//723564672.jpg
                  move_uploaded_file($_FILES["txtshopphoto"]["tmp_name"], "../admin/uploads/seller/".$filename2);

                  $is_approve= $_POST["txtsellerapprove"];

                  $user_name= $_POST["txtsellerusername"];

                  $password= $_POST["txtsellerpassword"];
                  $address= $_POST["txtselleraddress"];
                  $landmark= $_POST["txtsellerlandmark"];
                  $pincode= $_POST["txtsellerpincode"];
                  $aadhar_card= $_POST["txtselleraadharcard"];

                  $img = $_FILES["txtaadharcardphoto"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename3 = time().".".$ext;//723564672.jpg
                  move_uploaded_file($_FILES["txtaadharcardphoto"]["tmp_name"], "../admin/uploads/seller/".$filename3);







                  $result = mysqli_query($conn,"insert into tbl_seller (name,shop_name,contact_number,email_id,web_site,about,certificate_url,logo,shop_photo,is_approve,user_name,password,address,landmark,pincode,aadhar_card,aadhar_photo) values ('$sellername','$shopname','$contactnumber',' $email_id','$web_site','$about','$filename004','$filename1','$filename2','$is_approve','$user_name','$password','$address','$landmark','$pincode','$aadhar_card','$filename3')") or die(mysqli_error($conn));

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




              <!-- form start -->
              <form id="form1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="txtsellername">Seller Name</label>
                    <input type="txtsellername" name="txtsellername" class="form-control" id="txtsellername" >
                  </div>
                  <div class="form-group">
                    <label for="txtsellershopname">Shop Name</label>
                    <textarea class="form-control" name="txtsellershopname" id="txtsellershopname"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsellercontactnumber">Contact Number</label>
                    <textarea class="form-control" name="txtsellercontactnumber" id="txtsellercontactnumber"></textarea>
                  </div>

                   <div class="form-group">
                    <label for="txtselleremailid">Email Id</label>
                    <textarea class="form-control" name="txtselleremailid" id="txtsellercontactnumber"></textarea>
                 </div>

                  <div class="form-group">
                    <label for="txtsellerwebsite">Web Site</label>
                    <textarea class="form-control" name="txtsellerwebsite" id="txtsellerwebsite"></textarea>
                 </div>

                 <div class="form-group">
                    <label for="txtsellerabout">About</label>
                    <textarea class="form-control" name="txtsellerabout" id="txtsellerabout"></textarea>
                 </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Certificate Url</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtsellercertificateurl" id="txtaadharcardphoto">
                        <label class="custom-file-label" for="txtsellercertificateurl">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtsellerlogo" id="txtsellerlogo">
                        <label class="custom-file-label" for="txtsellerlogo">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Shop Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtshopphoto" id="txtshopphoto">
                        <label class="custom-file-label" for="txtshopphoto">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="txtsellerapprove">Is Approve</label>
                    <select class="form-control" id="txtsellerapprove" name="txtsellerapprove">
                      
                        <option value="<?php echo $row["address"] ?>">YES</option>
                        <option value="<?php echo $row["address"] ?>">No</option>
                      
                    </select>
                  </div>


                   <div class="form-group">
                    <label for="txtsellerusername">User Name</label>
                    <textarea class="form-control" name="txtsellerusername" id="txtsellerusername"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsellerpassword">Password</label>
                    <textarea class="form-control" name="txtsellerpassword" id="txtsellerpassword"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtselleraddress">Address</label>
                    <textarea class="form-control" name="txtselleraddress" id="txtselleraddress"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsellerlandmark">Landmark</label>
                    <textarea class="form-control" name="txtsellerlandmark" id="txtsellerlandmark"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsellerpincode">Pincode</label>
                    <textarea class="form-control" name="txtsellerpincode" id="txtsellerpincode"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtselleraadharcard">Aadhar Card</label>
                    <textarea class="form-control" name="txtselleraadharcard" id="txtselleraadharcard"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Aadhar Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="txtaadharcardphoto" id="txtaadharcardphoto">
                        <label class="custom-file-label" for="txtaadharcardphoto">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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

   <!-- <php include 'footer.php'; ?> -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
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
