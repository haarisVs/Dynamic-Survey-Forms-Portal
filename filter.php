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
          
          <!-- ./col -->
          
          <!-- ./col -->
          
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-sm-4">
             
          </div>

          <div class="col-sm-4">
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Generate Feedback by option</h3>
              </div>
              <div class="card-body">
              <form method="POST" action="reportFour.php" autocomplete="off">
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
                        <select name="OptionTitles[]" id="OId" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option disabled="">Choose Form </option>
                        </select>
                </div>
                
                <div class="form-group">
                 <center><button type="submit" name="OptionT" class="btn btn-primary">Generete</button></center> 
                </div>
              </form>
                
              </div>


              
            </div>
          </div>


          <div class="col-sm-4">
             
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
        data: {"multiQId":QId,},
        cache: false,
        success:function(res){
         // console.log(res);
           $('#OId').append('<option disabled value=""> choose...</option>');
           var parsedJson = JSON.parse(res);
           parsedJson.forEach(function(res){
          
          $('#OId').append("<option value='"+ res.QOptionTitle + "'>" + res.QOptionTitle + "</option>");
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



</script>

</html>
