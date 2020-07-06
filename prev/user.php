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

          <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">User Registration</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="scqprocess.php">
                  <div  id="singleForm">
                    <div class="row justify-content-center">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>User Type</label>
                        <select name="user_type" class="form-control" required>
                          <option disabled value="">Choose..</option>
                          <option value="client">Client</option>
                          <option value="admin">Admin</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <!-- <label>Password</label> -->
                        <!-- <input type="password" name="password" class="form-control" placeholder="Enter ..."> -->
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <div class="form-group">
                          <button type="submit" name="regUser" class="btn btn-primary">Register</button>
                      </div>
                    </div>
                  </div>
                </div>
                  
                  
                <!-- <div class="card-footer"> -->
                  <!-- <button type="submit" name="addSCQ" class="btn btn-primary">And</button> -->
                <!-- </div> -->
                  <!-- input states -->                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>    

            

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
