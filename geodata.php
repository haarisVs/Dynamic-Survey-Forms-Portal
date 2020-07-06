<?php 
require 'db.php';
$obj->is_login();

 ?>
<!DOCTYPE html>
<html>
<?php require 'headlinks.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
 <?php require 'navbar.php'; ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php require 'sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Daily Package Feedback form</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-sm-4">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Generate Feedback by option</h3>
              </div>
              <div class="card-body">
              <form method="POST" action="formReport.php" autocomplete="off">
                <div class="form-group">
                        <label>Select Form</label>
                        <select name="FormId" id="FormId"  class="form-control" style="width: 100%;" autocomplete="off">
                          <option disabled="" selected="">Choose Form </option>
                       <?php $formList =  $obj->fetchFormList();
                       foreach ($formList as $key => $value): ?>
                         <option value="<?=$value['formId']?>"><?=$value['formTitle']?></option>
                       <?php endforeach ?>
                        </select>
                </div>
                <div class="form-group">
                        <label>Select Question</label>
                        <select name="QId" id="QId" class="form-control" style="width: 100%;">
                          <option disabled="" selected="">Choose Form </option>
                        </select>
                </div>
                
                <div class="form-group">
                 <center><button type="submit" name="fbOpReport" class="btn btn-primary">Generete</button></center> 
                </div>
              </form>
                
              </div>


              
            </div>
          </div>  
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
              <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
              </div>
            </div>
          <div class="col-12">
              <!-- /.card-header -->
              <div class="card-body">
                  <div id="mapid" style="width: 1300px; height: 400px;"></div>
              </div>
            </div>
            <!-- /.card -->

            
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
 <?php require 'footerlinks.php'; ?>
</body>
<script>
$(document).ready(function(){
    $('#FormId').change(function(){
      fId = $('#FormId').val();
       $('#QId').empty();
        $('#OId').empty(); 
      // alert(fId);
      $.ajax({
        url:'adminprocess.php',
        method: 'post',
        data: {"fIdgeopage":fId,},
        cache: false,
        success:function(res){
         // console.log(res);

           $('#QId').append('<option disabled value=""> choose...</option>');
           var parsedJson = JSON.parse(res);
           parsedJson.forEach(function(res){
          // console.log(response.pName);
          // console.log(response.pId);
          // alert(pName);
          
          $('#QId').append('<option value = ' +res.formQuestionId + '>' + res.formQuestionTitle + '</option>');
       });
        }
      })
    });
  });


  // FOR QUESTION OPTIONS







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
$(document).ready(function(){
    $('#QId').change(function(){
      QId = $('#QId').val();

        $('#OId').empty();
        // alert(QId);
     var  lat = [];
     var  lon = [];
      $.ajax({
        url:'adminprocess.php',
        method: 'post',
        data: {"QIdgeopage":QId,},
        cache: false,
        success:function(response){
         console.log(response);
           var res = JSON.parse(response);
            console.log(res);

           
                      //   for(var i in res){
          //       lat.push(res[i].lat); 
          //       lon.push(res[i].lon); 

          //   }
          //   console.log(lat);
                      var greenIcon = new L.Icon({
            iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
          });
           for (var j = 0; j<res.length; j++) {
                marker = new L.marker([res[j][0], res[j][1]],{icon: greenIcon})
                .bindPopup("You clicked the map at LAT: "+ res[j][0]+" and LONG: "+res[j][1])
                .addTo(mymap);
            }

          //             var blueIcon = new L.Icon({
          //   iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
          //   shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
          //   iconSize: [25, 41],
          //   iconAnchor: [12, 41],
          //   popupAnchor: [1, -34],
          //   shadowSize: [41, 41]
          // });


            // for (var j = 0; j < lat.length; j++) {
            //   if (j >1 ) {
            //      marker = new L.marker([lat[j], lon[j]],{icon: greenIcon})
            //     .bindPopup("You clicked the map at LAT: "+ lat[j]+" and LONG: "+lon[j] )
            //     .addTo(mymap);
            //   }
            //   else{
            //       marker = new L.marker([lat[j], lon[j]],{icon: blueIcon})
            //     .bindPopup("You clicked the map at LAT: "+ lat[j]+" and LONG: "+lon[j] )
            //     .addTo(mymap);
            //   }
           
            // }

            // for (var j = 0; j < lat.length; j++) {
            // marker2 = new L.marker([lat[j], lon[j]],{icon: blueIcon})
            //   .bindPopup("You clicked the map at LAT: "+ lat[j]+" and LONG: "+lon[j] )
            //   .addTo(mymap);
            // }
         // console.log(parsedJson);
       //     $('#OId').append('<option disabled value=""> choose...</option>');
       //     var parsedJson = JSON.parse(res);
       //     parsedJson.forEach(function(res){
          
       //    $('#OId').append('<option value = ' +res.QOptionId + '>' + res.QOptionTitle + '</option>');
       // });
        }
      })
    });
  });


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


   //-------------
    //- BAR CHART -
    //-------------
var optionName = [];

var fbNum = [];

$('#QId').change(function(){
 var selectedText = $(this).find("option:selected").text();
   QId = $('#QId').val();

   $.ajax({
        url: 'adminprocess.php',
        type: 'post',
        data: { "opName": QId},
        success: function(response){
          var res = $.parseJSON(response);
       
        
          for (var i in res) {
                        optionName.push(res[i]); 
                    }
                     // console.log(dateofBar); 
       }
    })
 // console.log(selectedText);

 $.ajax({
        url: 'adminprocess.php',
        type: 'post',
        data: { "fbQuantity": QId},
        success: function(response){
          var res = $.parseJSON(response);
       
        
          for (var i in res) {
                        fbNum.push(res[i]); 
                    }
                     console.log(fbNum); 
       }
    })
 var areaChartData = {
      labels  : optionName,
      datasets: [
        {
          label               :  selectedText,
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : fbNum
        }
      ]
    }
     // optionName.indexOf(fbNum);
    var barChartCanvas = $('#barChart');

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: areaChartData,
      options: barChartOptions
    })
     for (var i = fbNum.length; i > 0; i--) {
   fbNum.pop();
   optionName.pop();
  }

});



    



    
</script>
</html>
