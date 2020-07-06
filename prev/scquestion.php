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
<?php if ($_GET['form'] == 'single'){?>
          <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Single Choice Question for Package feedback</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="scqprocess.php">
                  <div  id="singleForm">
                    <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Select Package Category</label>
                        <select class="form-control" name="package" required="">
                          <option disabled="" selected="" value="">Please select</option>
                          <option value="daily">Daily Package</option>
                          <option value="weekly">Weekly Package</option>
                          <option value="monthly">Monthly Package</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Add Single Choice Question</label>
                        <input type="text" name="scq" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Add Radio Option</label>
                        <input type="text" name="sco_op[]" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Add</label>
                        <input type="button" value="+" id="addSingle" class="form-control btn btn-primary
                        " placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  </div>
                  
                  
                <!-- <div class="card-footer"> -->
                  <button type="submit" name="addSCQ" class="btn btn-primary">And</button>
                <!-- </div> -->
                  <!-- input states -->                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>    
<?php }elseif($_GET['form'] == 'multi') {?>
            <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Multi Choice Question for Package feedback</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="scqprocess.php" >
                  <div id="multiForm">
                    <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Select Package Category</label>
                        <select class="form-control" name="package" required>
                          <option disabled="" selected="" value="">Please select</option>
                          <option value="daily">Daily Package</option>
                          <option value="weekly">Weekly Package</option>
                          <option value="monthly">Monthly Package</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Add Multi Choice Question</label>
                        <input type="text" name="mcq_q" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Add CheckBox Option</label>
                        <input type="text" name="mco_op[]" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Add</label>
                        <input type="button" value="+" id="addMulti" class="form-control btn btn-primary
                        " placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  </div>
                  
                <!-- <div class="card-footer"> -->
                  <button type="submit" name="addMCQ" class="btn btn-primary">ADD</button>
                <!-- </div> -->
                  <!-- input states -->                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>    
<?php  }elseif($_GET['form'] == 'open'){?>
           <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Open feedback Question for Package feedback</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="scqprocess.php">
                  <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Select Package Category</label>
                        <select class="form-control" name="package" required>
                          <option disabled="" selected="" value="">Please select</option>
                          <option value="daily">Daily Package</option>
                          <option value="weekly">Weekly Package</option>
                          <option value="monthly">Monthly Package</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Add Multi Choice Question</label>
                        <input type="text" name="ocq_q" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  
                <!-- <div class="card-footer"> -->
                  <button type="submit" name="addOPEN" class="btn btn-primary">ADD</button>
                <!-- </div> -->
                  <!-- input states -->                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>


<?php } ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php require 'footerlinks.php'; ?>
</body>
<!-- Single choice question and Multi choice question optoin add dynamically -->
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#addSingle').click(function(){  
           i++;  
           $('#singleForm').append('<div id="row'+i+'" class="row justify-content-center"><div class="col-sm-5"><div class="form-group"><label>Add Radio Option</label><input type="text" name="sco_op[]" class="form-control" placeholder="Enter ..."></div></div><div class="col-sm-1"><div class="form-group"><label>Add</label><input type="button" value="x" id="'+i+'" class="form-control btn btn-danger btn_remove" placeholder="Enter ..."></div></div></div>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      // $('#submit').click(function(){            
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      // });  
 });  


 $(document).ready(function(){  
      var i=1;  
      $('#addMulti').click(function(){  
           i++;  
           $('#multiForm').append('<div id="row'+i+'" class="row justify-content-center"><div class="col-sm-5"><div class="form-group"><label>Add Radio Option</label><input type="text" name="mco_op[]" class="form-control" placeholder="Enter ..."></div></div><div class="col-sm-1"><div class="form-group"><label>Add</label><input type="button" value="x" id="'+i+'" class="form-control btn btn-danger btn_remove" placeholder="Enter ..."></div></div></div>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      // $('#submit').click(function(){            
      //      $.ajax({  
      //           url:"name.php",  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      });  
      // });  
 });  
 </script>
</html>
