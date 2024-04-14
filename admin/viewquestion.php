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
    <title>Farmer Project - Question</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                            <h1>Manage Question</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Question</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">


                        <div class="col-12">

                            <div class="card">

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                if(isset($_POST["btndelete"]))
                {
                  $id=$_POST["deleteid"];
                  $result=mysqli_query($conn,"delete from questions where question_id='$id'");
                  if($result==true)
                  {
                    echo "<script>window.location='viewquestion.php';</script>";
                  }
                  else
                  {
                    echo "Delete Error";
                  }
                }
                ?>


                                    <?php
                if(isset($_GET["apid"]))
                {
                  $apid=$_GET["apid"];
                  $status=$_GET["status"];

                  if($status=="No")
                  {
                      $result=mysqli_query($conn,"update questions set approve='Yes' where question_id='$apid'");
                  }
                  else
                  {
                      $result=mysqli_query($conn,"update questions set approve='No' where question_id='$apid'");
                  }
                  echo "<script>window.location='viewquestion.php';</script>";
                }
                ?>

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User id</th>
                                                <th>Question</th>
                                                <th>Approve</th>
                                                <th>Question date time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      $result = mysqli_query($conn,"select * from questions") or die(mysqli_error($conn));
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                                            <tr>
                                                <td><?php echo $row["farmers_id"]; ?></td>
                                                <td><?php echo $row["question"]; ?>
                                                </td>
                                                <td><a
                                                        href="?apid=<?php echo $row["question_id"]; ?>&status=<?php echo $row["approve"]; ?>"><?php echo $row["approve"]; ?></a>
                                                </td>
                                                <td><?php echo $row["question_date_time"]; ?></td>
                                                <td>
                                                    <a href="questionsdetails.php?id=<?php echo $row["question_id"]; ?>"
                                                        class="btn btn-dark btn-sm">View</a>
                                                    <a data-id="<?php echo $row["question_id"]; ?>" data-toggle="modal"
                                                        data-target="#modal-default" href="javascript:void(0);"
                                                        class="btn btn-danger btn-sm btn-delete">Delete</a>
                                                </td>

                                            </tr>
                                            <?php } ?>

                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'footer.php'; ?>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Warning!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete record?</p>
                    </div>
                    <form method="post">
                        <div class="modal-footer justify-content-between">

                            <input type="hidden" name="deleteid" id="deleteid">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="submit" name="btndelete" class="btn btn-primary">Yes</button>

                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

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
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {

        $(".btn-delete").click(function() {
            var id = $(this).attr("data-id");
            $("#deleteid").val(id);
        });

    });
    </script>
</body>

</html>