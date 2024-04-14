<?php
session_start();
unset($_SESSION["isuserlogin"]);
unset($_SESSION["userid"]);
unset($_SESSION["name"]);
echo "<script>window.location='index.php';</script>";
?>