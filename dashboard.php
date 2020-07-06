<?php require 'db.php';
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
            <h1 class="m-0 text-dark">Dashboard</h1>
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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-sm-4">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Generate Forms Report</h3>
              </div>
              <div class="card-body">
              <form method="POST" action="formReport.php">
                <div class="form-group">
                  <label>From</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="date1" class="form-control float-right" >
                  </div>      
                </div>
                <div class="form-group">
                  <label>To</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="date2" class="form-control float-right">
                  </div>
                </div>
                <div class="form-group">
                 <center><button type="submit" name="report" class="btn btn-primary">Generete</button></center> 
                </div>
              </form>
                
              </div>



            </div>
          </div>

          <div class="col-sm-4">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Generate Feedback by option</h3>
              </div>
              <div class="card-body">
              <form method="POST" action="formReport.php" autocomplete="off">
                <div class="form-group">
                        <label>Select Form</label>
                        <select name="FormId[]" id="FormId" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" autocomplete="off">
                          <option disabled="">Choose Form </option>
                       <?php $formList =  $obj->fetchFormList();
                       foreach ($formList as $key => $value): ?>
                         <option value="<?=$value['formId']?>"><?=$value['formTitle']?></option>
                       <?php endforeach ?>
                          
                         
                        </select>
                </div>
                <div class="form-group">
                        <label>Select Question</label>
                        <select name="QId[]" id="QId"  class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option disabled="">Choose Form </option>
                          
                        </select>
                </div>
                <div class="form-group">
                        <label>Select Option</label>
                        <select name="OId[]" id="OId" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option disabled="">Choose Form </option>
                        </select>
                </div>
                
                <div class="form-group">
                 <center><button type="submit" name="fbOpReport" class="btn btn-primary">Generete</button></center> 
                </div>
              </form>
                
              </div>


              
            </div>
          </div>


          <div class="col-sm-4">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Generate Forms Feedback Report</h3>
              </div>
              <div class="card-body">
              <form method="POST" action="formReport.php">
                <div class="form-group">
                  <label>From</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="date3" class="form-control float-right" id="reservation">
                  </div>      
                </div>
                <div class="form-group">
                  <label>To</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="date4" class="form-control float-right">
                  </div>
                </div>
                <div class="form-group">
                 <center><button type="submit" name="FBreport" class="btn btn-primary">Generete</button></center> 
                </div>
              </form>
              </div>
            </div>
          </div>
          
        </div>
        

        </div>

<div class="row">
  <div class="col-md-6">
    <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart </h3>
                <br>
                <h3  class="card-title"> Forms Question Quantity</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="chart">
                <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
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
</div>


        
        
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require 'footerlinks.php'; ?>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $('#FormId').change(function(){
      fId = $('#FormId').val();
       $('#QId').empty();
        $('#OId').empty(); 
      // alert(fId);
      $.ajax({
        url:'adminprocess.php',
        method: 'post',
        data: {"fId":fId,},
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
  $(document).ready(function(){
    $('#QId').change(function(){
      QId = $('#QId').val();
        $('#OId').empty();
        // alert(QId);
     
      $.ajax({
        url:'adminprocess.php',
        method: 'post',
        data: {"QId":QId,},
        cache: false,
        success:function(res){
         // console.log(res);
           $('#OId').append('<option disabled value=""> choose...</option>');
           var parsedJson = JSON.parse(res);
           parsedJson.forEach(function(res){
          
          $('#OId').append('<option value = ' +res.QOptionId + '>' + res.QOptionTitle + '</option>');
       });
        }
      })
    });
  });

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })


var namess = [];
  $.ajax({
        url: 'adminprocess.php',
        type: 'post',
        data: { "check": "1"},
        success: function(response){
          var res = $.parseJSON(response);
         // console.log("resp"+response); 
         //var name = [];
          for (var i in res) {
                        namess.push(res[i]);
                        
                    }
                    // console.log(namess) //now run
       }
    })
var dataa = [];
  $.ajax({
        url: 'adminprocess.php',
        type: 'post',
        data: { "pieData": "1"},
        success: function(response){
          var res = $.parseJSON(response);
         // console.log("resp"+response); 
         //var name = [];
          for (var i in res) {
                        dataa.push(res[i]);
                        
                    }
                    // console.log(dataa) //now run
       }
    })


 // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#myChart')
    var pieData        = {
      labels: namess,
      datasets: [
        {
          data: dataa,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    };
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })


    //-------------
    //- BAR CHART -
    //-------------
var dateofBar = [];
$.ajax({
        url: 'adminprocess.php',
        type: 'post',
        data: { "barChart": "1"},
        success: function(response){
          var res = $.parseJSON(response);
       
        
          for (var i in res) {
                        dateofBar.push(res[i]); 
                    }
                     // console.log(dateofBar); 
       }
    })
var fbNum = [];
$.ajax({
        url: 'adminprocess.php',
        type: 'post',
        data: { "barChartFb": "1"},
        success: function(response){
          var res = $.parseJSON(response);
       
        
          for (var i in res) {
                        fbNum.push(res[i]); 
                    }
                     console.log(fbNum); 
       }
    })

    var areaChartData = {
      labels  : dateofBar,
      datasets: [
        {
          label               : 'Number of Feedback',
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
</script>

</html>
