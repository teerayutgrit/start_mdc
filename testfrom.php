<!DOCTYPE html>
<html>
<head>
    <title>กรอกข้อมูล</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrpXCQ89oWF2OVtp9r9lQco72BM3ps9yo&libraries=places&callback=initMap" async defer></script>
</head>
<body>
    <form action="salevisit_insertdatatest.php" method="post">
        <label for="name">ชื่อ:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="age">อายุ:</label><br>
        <input type="hidden" id="lat" name="lat">
        <input type="hidden" id="lng" name="lng">
        <button type="button" onclick="getCurrentLocation()">ระบุตำแหน่งปัจจุบัน</button><br><br>
        <input type="submit" value="บันทึก">
    </form>

    <script>
        function getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            document.getElementById("lat").value = position.coords.latitude;
            document.getElementById("lng").value = position.coords.longitude;
            var geocoder = new google.maps.Geocoder();
            var latlng = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        document.getElementById("location").value = results[0].formatted_address;
                    } else {
                        window.alert('ไม่พบสถานที่');
                    }
                } else {
                    window.alert('การร้องขอสถานที่ล้มเหลว เนื่องจาก ' + status);
                }
            });
        }
    </script>
</body>
</html>
