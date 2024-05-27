<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Location</title>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

             ส่งค่าละติจูดและลองจิจูดไปยัง PHP
            window.location.href = "save_location.php?latitude=" + latitude + "&longitude=" + longitude;
        }
    </script>
</head>
<body>
    <button onclick="getLocation()">Get Current Location</button>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Example</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12, // ขนาดการซูม
                center: {lat: 13.744498, lng: 100.551048} // ตำแหน่งเริ่มต้น
            });

            // โหลดข้อมูล JSON จากไฟล์ json.php โดยใช้ AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var locations = JSON.parse(this.responseText);
                    locations.forEach(function(location) {
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(location.Latitude), lng: parseFloat(location.Longitude)}, // ตำแหน่งของหมุด
                            map: map,
                            title: location.Customer_name // ชื่อหมุด
                        });
                    });
                }
            };
            xhr.open("GET", "json.php", true);
            xhr.send();
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrpXCQ89oWF2OVtp9r9lQco72BM3ps9yo&callback=initMap"></script>
</body>
</html>

