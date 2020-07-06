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
<style type="text/css">
  .highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
</style>
    <section class="content">
      <div class="row">
        <div class="col-12">
         
          <!-- /.card -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
          <div class="card">
           <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Pie charts are very popular for showing a compact overview of a
        composition or comparison. While they can be harder to read than
        column charts, they remain a popular choice for small datasets.
    </p>
</figure>

            <!-- /.card-header -->
            <div class="card-body">
              
            </div>
            <!-- /.card-body -->
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

var questionData = [];

$.ajax({
        url: 'adminprocess.php',
        type: 'post',
        data: { "optionsDataa": "1"},
        success: function(response){
          var res = $.parseJSON(response);
       
        
          for (var i in res) {
                        questionData.push(res[i]); 
                    }
                     console.log(questionData); 
       }
    })

 Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [questionData]
});
</script>
</html>
