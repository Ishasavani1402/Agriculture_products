<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Map</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Default CSS-->
    <link href="css/default.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--Color Switcher CSS-->
    <link rel="stylesheet" href="css/color/color-default.css">
    <!--Plugin CSS-->
    <link href="css/plugin.css" rel="stylesheet" type="text/css">
    <!--Flaticons CSS-->
    <link href="fonts/flaticon.css" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <style>
        #map_wrapper {
    height: 400px;
}
#map_canvas {
    width: 100%;
    height: 100%;
}
    </style>
</head>
<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    <!-- header starts -->
   <?php
   include "header.php";
   ?>
    <!-- header ends -->

    <!-- Breadcrumb -->
    <!-- BreadCrumb Ends -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- table start -->
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div id="map_wrapper">
    <div id="map_canvas" class="mapping"></div>
</div>
                
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
    <!-- Shop Ends -->

   <!-- footer starts -->
   <?php
   include "footer.php";
   ?>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
   

    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

    <script>
        jQuery(function($) {
        <!-- Asynchronously Load the map API  -->
        var script = document.createElement('script');
        script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
        document.body.appendChild(script);
    });
    function initialize() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };
                        
        <!-- Display a map on the page -->
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);
            
        <!-- Multiple Markers -->
        var markers = [
            <?php
                             $resulu = mysqli_query($conn,"select * from shop as s left join city as c on c.city_id= s.city_id order by s.shop_id desc")or die(mysqli_error($conn));
                            while($row=mysqli_fetch_assoc($resulu))
                            {
                            ?>
            ['<?php echo $row["shopname"];?>', <?php echo $row["latitude"];?>, <?php echo $row["longitude"];?>, <?php echo $row["shop_id"];?>],

            <?php } ?>
         
        ];
                            
        <!-- Info Window Content -->
        var infoWindowContent = [
            <?php
                             $resulu = mysqli_query($conn,"select * from shop as s left join city as c on c.city_id= s.city_id order by s.shop_id desc")or die(mysqli_error($conn));
                            while($row=mysqli_fetch_assoc($resulu))
                            {
                            ?>
            ['<div class="info_content">' +
            '<h3><?php echo $row["shopname"] ?></h3>' +
            '<h4><?php echo $row["contact"] ?></h4>' +
            '</div>'],

            <?php } ?>
         
         
        ];
            
        <!-- Display multiple markers on a map -->
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        
        <!-- Loop through our array of markers & place each one on the map   -->
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });
            
            <!-- Allow each marker to have an info window     -->
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
            <!-- Automatically center the map fitting all markers on the screen -->
            map.fitBounds(bounds);
        }
        <!-- Override our map zoom level once our fitBounds function runs (Make sure it only runs once) -->
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(10);
            google.maps.event.removeListener(boundsListener);
        });
        
    }
    </script>

</body>
</html>