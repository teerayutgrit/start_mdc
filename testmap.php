<?php
// Check login
require_once 'session_check.php';
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    #map {
      height: 500px; /* Define the height of the map */
      width: 100%; /* Define the width of the map */
    }
  </style>
</head>
<body>

<?php
    // Prepare the statement to prevent SQL injection
    $stmt = sqlsrv_prepare($conn, "SELECT * FROM MDC_Visitor");

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $locations = [];
    if (sqlsrv_execute($stmt)) {
        while ($result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $lat = $result['Latitude'];
            $lng = $result['Longitude'];
            $customerName = $result['Customer_name'];
            $locations[] = [
                'lat' => $lat,
                'lng' => $lng,
                'customerName' => $customerName
            ];
        }
    } else {
        echo "Error in statement execution.\n";
        die(print_r(sqlsrv_errors(), true));
    }
?>

<div class="row">
  <div class="col-lg-12 mb-4">
    <div class="col-12 card border-left-primary text-dark mb-1 me-0.5" style="margin:15px 10px 10px 10px;">
      <div class="card-header shadow" style="padding: 10px 10px 10px 10px;">
        <i class="fa fa-map-marker text-primary"></i> Map
      </div>
      <div class="card-body d-flex justify-content-center align-items-center">
        <div id="map"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrpXCQ89oWF2OVtp9r9lQco72BM3ps9yo&callback=initMap" async defer></script>
<script>
function initMap() {
    // Fetch locations from PHP
    var locations = <?php echo json_encode($locations); ?>;

    // Define a default center location for the map
    var defaultLocation = {lat: 0, lng: 0};

    if (locations.length > 0) {
        defaultLocation = {
            lat: parseFloat(locations[0].lat),
            lng: parseFloat(locations[0].lng)
        };
    }

    // Create the map centered on the default location
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: defaultLocation
    });

    // Custom icon URL
    var iconBase = 'img/';
    // var customIcon = iconBase + 'mdk.png'; // Replace with your custom icon URL
    var customIcon = {
        url: iconBase + 'mdk.png', // Replace with your custom icon URL
        scaledSize: new google.maps.Size(30, 30) // Adjust the size (width, height)
    };

    // Loop through the locations and place a marker for each
    locations.forEach(function(location) {
        var latLng = {
            lat: parseFloat(location.lat),
            lng: parseFloat(location.lng)
        };

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            title: location.customerName,
            icon: customIcon // Set the custom icon
            // scaledSize: new google.maps.Size(50, 50)
        });

        // Add a click listener to the marker
        google.maps.event.addListener(marker, 'click', function() {
            window.open(
                'https://www.google.com/maps/search/?api=1&query=' + latLng.lat + ',' + latLng.lng
            );
        });
    });
}

// Initialize the map when the window loads
window.onload = initMap;
</script>

</body>
</html>
