<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Project - register Seller</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
        .wrapper{
            margin-left : 350px;
            margin-right : 350px;
            margin-top : 50px;
            margin-bottom : 50px;
            width : 800px;
            

        }
 
    
    </style>
</head>
<body>
    <div class="wrapper">

    <?php
              if(isset($_POST["btnseller"]))
              {
                  $sellername= $_POST["txtsellername"];
                  $shopname= $_POST["txtsellershopname"];
                  $contactnumber= $_POST["txtsellercontactnumber"];
                  $email_id= $_POST["txtselleremailid"];
                  $web_site= $_POST["txtsellerwebsite"];
                  $about= $_POST["txtsellerabout"];


                  $img = $_FILES["txtsellercertificateurl"]["name"];
                  $ext  = pathinfo($img,PATHINFO_EXTENSION);//jpg
                  $filename004 = time().rand(1111,9999).".".$ext;//723564672.jpg
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

    <!-- <h1 class="card-title">Add seller</h1><br> -->
        <form id="form1" method="post" enctype="multipart/form-data">

            
                    <div class="card-body">
                    <div class="form-group">
                        <label for="txtsellername">Seller Name</label>
                        <input type="text" pattern="[A-Za-z '-]{1,50}" required name="txtsellername" class="form-control" id="txtsellername" >
                    </div>
                    <div class="form-group">
                        <label for="txtsellershopname">Shop Name</label>
                        <input type="text" pattern="[A-Za-z '-]{1,50}" required class="form-control" name="txtsellershopname" id="txtsellershopname"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtsellercontactnumber">Contact Number</label>
                        <input type="tel" placeholder="0123456789" pattern="[0-9]{10}" required Format: 0123456789 maxlength="10" class="form-control" name="txtsellercontactnumber" id="txtsellercontactnumber"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtselleremailid">Email Id</label>
                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required class="form-control" name="txtselleremailid" id="txtsellercontactnumber"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtsellerwebsite">Web Site</label>
                        <input class="form-control" pattern="[A-Za-z '-]{1,50}" required name="txtsellerwebsite" id="txtsellerwebsite"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtsellerabout">About</label>
                        <input class="form-control" type="text" pattern="[A-Za-z '-]{1,255}" required maxlength="100" name="txtsellerabout" id="txtsellerabout"></input>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Certificate Url</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept=".png,.jpg,.jpeg" required class="custom-file-input" name="txtsellercertificateurl" id="txtsellercertificateurl">
                            <label class="custom-file-label" for="txtsellercertificateurl">Choose file</label>
                        </div>
                        <!-- <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept=".png,.jpg,.jpeg" required class="custom-file-input" name="txtsellerlogo" id="txtsellerlogo">
                            <label class="custom-file-label" for="txtsellerlogo">Choose file</label>
                        </div>
                        <!-- <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Shop Photo</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept=".png,.jpg,.jpeg" required class="custom-file-input" name="txtshopphoto" id="txtshopphoto">
                            <label class="custom-file-label" for="txtshopphoto">Choose file</label>
                        </div>
                        <!-- <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtsellerapprove">Is Approve</label>
                        <select class="form-control" id="txtsellerapprove" name="txtsellerapprove">
                        
                            <option value="<?php echo $row["address"] ?>">YES</option>
                            <option value="<?php echo $row["address"] ?>">NO</option>
                        
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="txtsellerusername">User Name</label>
                        <input type="text" pattern="[A-Za-z '-]{1,50}" required class="form-control" name="txtsellerusername" id="txtsellerusername"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtsellerpassword">Password</label>
                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control" name="txtsellerpassword" id="txtsellerpassword"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtselleraddress">Address</label>
                        <input class="form-control" pattern="[A-Za-z '-]{1,50}" required name="txtselleraddress" id="txtselleraddress"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtsellerlandmark">Landmark</label>
                        <input class="form-control" pattern="[A-Za-z '-]{1,50}" required name="txtsellerlandmark" id="txtsellerlandmark"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtsellerpincode">Pincode</label>
                        <input type="text" pattern="[0-9]{6}" required maxlength="6" class="form-control" name="txtsellerpincode" id="txtsellerpincode"></input>
                    </div>

                    <div class="form-group">
                        <label for="txtselleraadharcard">Aadhar Card</label>
                        <input type="text" pattern="[0-9]{16}" required maxlength="16" class="form-control" name="txtselleraadharcard" id="txtselleraadharcard"></input>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Aadhar Photo</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept=".png,.jpg,.jpeg" required class="custom-file-input" name="txtaadharcardphoto" id="txtaadharcardphoto">
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
                    <button type="submit" name="btnseller" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>

    </div>
        
    

</body>
</html>