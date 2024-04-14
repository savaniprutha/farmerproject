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
  <title>Farmer Project - My Account</title>

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
            <h1>My Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Account Form</li>
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
                <h3 class="card-title">My Account</h3>
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
                  
                  if(empty($_FILES['txtsellercertificateurl']['name']))
                  {
                    $filename004=$_POST['sellerlogooldimage'];
                  }
                  else
                  {
                    //abc.jpg
                    $img = $_FILES["txtsellercertificateurl"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename004= time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtsellercertificateurl"]["tmp_name"], "../admin/uploads/seller/".$$filename004);
                  }


                  if(empty($_FILES['txtsellerlogo']['name']))
                  {
                    $filename1=$_POST['sellerlogooldimage'];
                  }
                  else
                  {
                    //abc.jpg
                    $img = $_FILES["txtsellerlogo"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename1= time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtsellerlogo"]["tmp_name"], "../admin/uploads/seller/".$filename1);
                  }

                  if(empty($_FILES['txtshopphoto']['name']))
                  {
                    $filename2=$_POST['sellerlogooldimage'];
                  }
                  else
                  {
                    //abc.jpg
                    $img = $_FILES["txtshopphoto"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename2= time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtshopphoto"]["tmp_name"], "../admin/uploads/seller/".$filename2);
                  }

                  $is_approve= $_POST["txtsellerapprove"];

                  $user_name= $_POST["txtsellerusername"];

                  // $password= $_POST["txtsellerpassword"];
                  $address= $_POST["txtselleraddress"];
                  $landmark= $_POST["txtsellerlandmark"];
                  $pincode= $_POST["txtsellerpincode"];
                  $aadhar_card= $_POST["txtselleraadharcard"];
                  


                  if(empty($_FILES['txtaadharcardphoto']['name']))
                  {
                    $filename3=$_POST['sellerlogooldimage'];
                  }
                  else
                  {
                    //abc.jpg
                    $img = $_FILES["txtaadharcardphoto"]["name"];
                    $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                    $filename3= time().".".$ext;//723564672.jpg
                    move_uploaded_file($_FILES["txtaadharcardphoto"]["tmp_name"], "../admin/uploads/seller/".$filename3);
                  }

                  $seller_id = $_SESSION["seller_id"];
                  //seller_id ='$seller_id'







                  $result = mysqli_query($conn,"update tbl_seller set name='$sellername',shop_name='$shopname',contact_number='$contactnumber',email_id='$email_id',web_site='$web_site',about='$about',certificate_url='$filename004',logo='$filename1',shop_photo='$filename2',is_approve='$is_approve',user_name='$user_name',address='$address',landmark='$landmark',pincode='$pincode',aadhar_card='$aadhar_card',aadhar_photo='$filename3' where seller_id='$seller_id'") or die(mysqli_error($conn));

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
                $id =  $_SESSION["seller_id"];
                $result = mysqli_query($conn,"select * from tbl_seller where seller_id='$id'");
                while($row=mysqli_fetch_assoc($result))
                {
              ?>




              <!-- form start -->
              <form id="form1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="txtsellername">Seller Name</label>
                    <input disabled type="txtsellername" name="txtsellername" class="form-control" id="txtsellername" value="<?php echo $row["name"] ?>">
                  </div>
                  <div class="form-group">
                    <label for="txtsellershopname">Shop Name</label>
                    <textarea disabled class="form-control" name="txtsellershopname" id="txtsellershopname"><?php echo $row["shop_name"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsellercontactnumber">Contact Number</label>
                    <textarea disabled class="form-control" name="txtsellercontactnumber" id="txtsellercontactnumber"><?php echo $row["contact_number"] ?></textarea>
                  </div>

                   <div class="form-group">
                    <label for="txtselleremailid">Email Id</label>
                    <textarea disabled class="form-control" name="txtselleremailid" id="txtsellercontactnumber"><?php echo $row["email_id"] ?></textarea>
                 </div>

                  <div class="form-group">
                    <label for="txtsellerwebsite">Web Site</label>
                    <textarea disabled class="form-control" name="txtsellerwebsite" id="txtsellerwebsite"><?php echo $row["web_site"] ?></textarea>
                 </div>

                 <div class="form-group">
                    <label for="txtsellerabout">About</label>
                    <textarea disabled class="form-control" name="txtsellerabout" id="txtsellerabout"><?php echo $row["about"] ?></textarea>
                 </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Certificate Url</label>
                    <!-- <div class="input-group">
                      <div class="custom-file">
                        <input disabled type="file" class="custom-file-input" name="txtsellercertificateurl" id="txtaadharcardphoto">
                        <input type="hidden" name="sellerlogooldimage" value="<?php echo $row["certificate_url"]; ?>">
                        <label class="custom-file-label" for="txtsellercertificateurl">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>

                    </div> -->
                     <div>
                    <img src="../admin/uploads/category/<?php echo $row["certificate_url"]; ?>" height="30%" width="30%">
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <!-- <div class="input-group">
                      <div class="custom-file">
                        <input disabled type="file" class="custom-file-input" name="txtsellerlogo" id="txtsellerlogo">
                        <input type="hidden" name="sellerlogooldimage" value="<?php echo $row["logo"]; ?>">
                        <label class="custom-file-label" for="txtsellerlogo">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      
                    </div> -->
                    <div>
                    <img src="../admin/uploads/category/<?php echo $row["logo"]; ?>" height="30%" width="30%">
                  </div>
                  </div>
                  

                

                  <div class="form-group">
                    <label for="exampleInputFile">Shop Photo</label>
                    <!-- <div class="input-group">
                      <div class="custom-file">
                        <input disabled type="file" class="custom-file-input" name="txtshopphoto" id="txtshopphoto">
                        <input type="hidden" name="sellerlogooldimage" value="<?php echo $row["shop_photo"]; ?>">
                        <label class="custom-file-label" for="txtshopphoto">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      
                    </div> -->
                    <div>
                    <img src="../admin/uploads/seller/<?php echo $row["shop_photo"]; ?>" height="30%" width="30%">
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="txtsellerapprove">Is Approve</label>
                    <select disabled class="form-control" id="txtsellerapprove" name="txtsellerapprove">
                      
                        <option>YES</option>
                        <option>No</option>
                      
                    </select>
                  </div>

                   <div class="form-group">
                    <label for="txtsellerusername">User Name</label>
                    <textarea disabled class="form-control" name="txtsellerusername" id="txtsellerusername"><?php echo $row["user_name"] ?></textarea>
                  </div>

                  <!-- <div class="form-group">
                    <label for="txtsellerpassword">Password</label>
                    <textarea class="form-control" name="txtsellerpassword" id="txtsellerpassword"><?php echo $row["password"] ?></textarea>
                  </div> -->

                  <div class="form-group">
                    <label for="txtselleraddress">Address</label>
                    <textarea disabled class="form-control" name="txtselleraddress" id="txtselleraddress"><?php echo $row["address"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsellerlandmark">Landmark</label>
                    <textarea disabled class="form-control" name="txtsellerlandmark" id="txtsellerlandmark"><?php echo $row["address"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtsellerpincode">Pincode</label>
                    <textarea disabled class="form-control" name="txtsellerpincode" id="txtsellerpincode"><?php echo $row["pincode"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="txtselleraadharcard">Aadhar Card</label>
                    <textarea disabled class="form-control" name="txtselleraadharcard" id="txtselleraadharcard"><?php echo $row["aadhar_card"] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Aadhar Photo</label>
                    <!-- <div class="input-group">
                      <div class="custom-file">
                        <input disabled type="file" class="custom-file-input" name="txtaadharcardphoto" id="txtaadharcardphoto">
                        <input type="hidden" name="sellerlogooldimage" value="<?php echo $row["aadhar_photo"]; ?>">
                        <label class="custom-file-label" for="txtaadharcardphoto">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      
                    </div> -->
                    <div>
                    <img src="../admin/uploads/category/<?php echo $row["aadhar_photo"]; ?>" height="30%" width="30%">
                  </div>
                  </div>

                  

                 
                  





                 
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" name="btnsubmit" class="btn btn-primary"></button>
                   <button type="reset" class="btn btn-danger">Reset</button>
                </div>
              </form>
              <?php
                }
              ?>
            </div> -->
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
