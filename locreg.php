<!DOCTYPE html>
<html>
<?php require 'headlinks.php'; ?> 
 
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>VERGE</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new admin</p>

      <form  id="locationUserReg" action="adminprocess.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="ad_name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="ad_username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="ad_email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="ad_password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <label>Set your Location</label>
           <div id="mapid" style="width: 400px; height: 300px;"></div>
          
        </div>
        <div class="input-group mb-3" hidden="">
          <input type="text" class="form-control" id="lat" name="lat" value="" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" hidden="">
          <input type="text" class="form-control" id="lon" name="lon" value="" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
         
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  id="submit" name="ad_reg" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
<script>

  var mymap = L.map('mapid').setView([28.3648185914011, 67.76367187500001], 4);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
  }).addTo(mymap);

  // L.marker([51.5, -0.09]).addTo(mymap)
  //   .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

  // L.circle([51.508, -0.11], 500, {
  //  color: 'red',
  //  fillColor: '#f03',
  //  fillOpacity: 0.5
  // }).addTo(mymap).bindPopup("I am a circle.");

  // L.polygon([
  //  [51.509, -0.08],
  //  [51.503, -0.06],
  //  [51.51, -0.047]
  // ]).addTo(mymap).bindPopup("I am a polygon.");


  var popup = L.popup();

  function onMapClick(e) {
    // popup
    //  .setLatLng(e.latlng)
    //  .setContent("You clicked the map at " + e.latlng.toString())
    //  .openOn(mymap);
      // var newMarker = new L.marker(e.latlng).addTo(mymap);

  }
var theMarker = {};

  mymap.on('click',function(e){
    lat = e.latlng.lat;
    lon = e.latlng.lng;
    $('#lat').val(lat);
    $('#lon').val(lon);

    console.log("You clicked the map at LAT: "+ lat+" and LONG: "+lon );
        //Clear existing marker, 

        if (theMarker != undefined) {
              mymap.removeLayer(theMarker);
        };

    //Add a marker to show where you clicked.
     theMarker = L.marker([lat,lon]).bindPopup("You clicked the map at LAT: "+ lat+" and LONG: "+lon ).addTo(mymap);  
});
  mymap.on('click', onMapClick);



 $('#submit').click(function() {
        if($('#lat').val() == ''){
      alert('Please set your location');
   }
     });
</script>
</html>
