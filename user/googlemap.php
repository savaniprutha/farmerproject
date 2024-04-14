<?php session_start(); ?>
<?php include 'connection.php'; ?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Map page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

</head>

<body>


   <!--header area start-->
    
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
   
    <!--offcanvas menu area end-->
    
    <?php include 'header.php'; ?>
    <!--header area end-->
    
    
     <!--shopping cart area start -->
    <div class="shopping_cart_area mt-70 mb-70">
        <div class="container">  
           <div id="Map" style="width: 100%; height: 450px;">
</div>
        </div>     
    </div>
  
    <!--footer area start-->
    <?php include 'footer.php'; ?>
    <!--footer area end-->

<!-- JS
============================================ -->
<!--jquery min js-->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="assets/js/jquery.instagramFeed.min.js"></script>
<!-- tippy bundle umd js -->
<script src="assets/js/tippy-bundle.umd.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var contentstring = [];
    var regionlocation = [];
    var markers = [];
    var iterator = 0;
    var areaiterator = 0;
    var map;
    var infowindow = [];
    geocoder = new google.maps.Geocoder();
    
    $(document).ready(function () {
        setTimeout(function() { initialize(); }, 400);
    });
    
    function initialize() {           
        infowindow = [];
        markers = [];
        GetValues();
        iterator = 0;
        areaiterator = 0;
        region = new google.maps.LatLng(regionlocation[areaiterator].split(',')[0], regionlocation[areaiterator].split(',')[1]);
        map = new google.maps.Map(document.getElementById("Map"), { 
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: region,
        });
        drop();
    }
    
    function GetValues() {
        //Get the Latitude and Longitude of a Point site : http://itouchmap.com/latlong.html
         <?php
         $count=0;
                      $result = mysqli_query($conn,"select * from tbl_shops") or die(mysqli_error($conn));
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
        contentstring[<?php echo $count; ?>] = "<?php echo $row["shop_name"]; ?>";
        regionlocation[<?php echo $count; ?>] = '<?php echo $row["lat"]; ?>, <?php echo $row["lng"]; ?>';
                    
       <?php $count++; } ?>
        
    }
           
    function drop() {
        for (var i = 0; i < contentstring.length; i++) {
            setTimeout(function() {
                addMarker();
            }, 800);
        }
    }
    function addMarker() {
        var address = contentstring[areaiterator];
        var icons = 'assets/img/shop.png';
        var templat = regionlocation[areaiterator].split(',')[0];
        var templong = regionlocation[areaiterator].split(',')[1];
        var temp_latLng = new google.maps.LatLng(templat, templong);
        markers.push(new google.maps.Marker(
        {
            position: temp_latLng,
            map: map,
            icon: icons,
            draggable: false
        }));            
        iterator++;
        info(iterator);
        areaiterator++;
    }
    function info(i) {
        infowindow[i] = new google.maps.InfoWindow({
            content: contentstring[i - 1]
        });
        infowindow[i].content = contentstring[i - 1];
        google.maps.event.addListener(markers[i - 1], 'click', function() {
            for (var j = 1; j < contentstring.length + 1; j++) {
                infowindow[j].close();
            }
            infowindow[i].open(map, markers[i - 1]);
        });
    }
</script>


</body>


</html>