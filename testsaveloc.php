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

            // ส่งค่าละติจูดและลองจิจูดไปยัง PHP
            window.location.href = "save_location.php?latitude=" + latitude + "&longitude=" + longitude;
        }
    </script>
</head>
<body>
    <button onclick="getLocation()">Get Current Location</button>
</body>
</html>
