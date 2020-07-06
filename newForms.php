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
          <div class="col-md-10">
            <div class="card card-warning">
              <div class="card-header">
              
                <h3 class="card-title"> Cellular Package feedback Form</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="process.php">
                  <!-- <div id="form"> -->
                    <div id="form" class="card-body">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Package</label>
                          <input type="text" name="fromTitle" class="form-control" id="exampleInputEmail1" placeholder="Title">
                        </div>
                      </div>
                      <!-- <div id="singlerow">
                        <div class="col-sm-5">
                          <div class="form-group">
                            <label>Question</label>
                              <div class="input-group">
                                <input type="text" name="scq" class="form-control" placeholder="Enter ...">
                          
                              </div>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <input type="radio">
                                </span>
                              </div>
                              <input type="text" class="form-control"><input type="button" value="+" id="addSingle" class="btn btn-primary
                          ">
                            </div>
                          </div>
                        </div>
                      </div> -->


                      <!-- <div id="multirow">
                        <div class="col-sm-5">
                          <div class="form-group">
                            <label>Question</label>
                              <div class="input-group">
                                <input type="text" name="" class="form-control" placeholder="Enter ...">
                          
                              </div>
                          </div>
                        </div>
                        <div id="multiOption" class="col-sm-5">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <input type="checkbox">
                                </span>
                              </div>
                              <input type="text" class="form-control"><input type="button" value="+" id="addMulti" class="btn btn-primary
                          ">
                            </div>
                          </div>
                        </div>
                      </div> -->
                       <!-- <div id="openrow">
                         <div class="col-sm-5">
                          <div class="form-group">
                            <label>Question</label>
                              <div class="input-group">
                                <input type="text" name="scq" class="form-control" placeholder="Enter ..."><input type="button" value="+" id="" class="btn btn-primary btn_remove_multi">
                          
                              </div>
                          </div>
                        </div>
                       </div> --> 
                      
                    </div>
                  <!-- </div> -->
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-2">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Forms</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div>
                  <div>
                   <button id="single" class="form-control btn btn-success"><input type="radio" name="" checked=""> Single-choice</button>
                  </div>
                  <br>
                  <div>
                    <button id="multi" class="form-control btn btn-primary"><input type="checkbox" name=""checked> Multi-choice</button>
                  </div>
                  <br>
                   <div>
                    <button id="open" class="form-control btn btn-warning">Open-choice</button>
                  </div>
                  <br>
                </div>
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
<script type="text/javascript">
  var i= 0;
  $(document).ready(function(){
    $('#single').on('click', function(){
   
      $('#form').append('<div id="singlerow'+i+'"><div class="col-sm-5"><div class="form-group"><label>Single Choice Question</label><div class="input-group"> <input type="hidden" name="questionType[]" value="single" class="form-control"> <input type="text" name="question[]" class="form-control" placeholder="Enter ..."><input type="button" value="x" id="'+i+'" class="btn btn-danger btn_remove"></div></div></div><div id="singleOption'+i+'" class="col-sm-5"><div class="form-group"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio"></span></div><input type="text" name="option['+i+'][]" class="form-control"><input type="button" value="+" id="addSingle"  onclick="addField('+i+')" class="btn btn-primary"></div></div></div></div>');
         i++;
    });
    $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#singlerow'+button_id+'').remove(); 
           i--; 
    }); 
    $(document).on('click', '.btn_remove_option', function(){
          var button_id = $(this).attr("id");   
          $('#oprow'+button_id+'').remove();  
    });
  });
  function addField(val){
         $('#singleOption'+val+'').append('<div id="oprow'+val+'" class="form-group"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio"></span></div><input type="text" name="option['+val+'][]" class="form-control"><input type="button" value="x" id="'+val+'" class="btn btn-warning btn_remove_option"></div></div>')
      }

 
  $(document).ready(function(){
    $('#multi').on('click', function(){
    
      $('#form').append('<div id="multirow'+i+'"><div class="col-sm-5"><div class="form-group"><label>Multi Choice Question</label><div class="input-group"> <input type="hidden" name="questionType[]" value="multi" class="form-control"> <input type="text" name="question[]" class="form-control" placeholder="Enter ..."><input type="button" value="x" id="'+i+'" class="btn btn-danger btn_remove_multi"></div></div></div><div id="multiOption'+i+'" class="col-sm-5"><div class="form-group"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="checkbox"></span></div><input type="text" name="option['+i+'][]" class="form-control"><input type="button" value="+" id="addMulti" onclick="addMultiOption('+i+')" class="btn btn-primary"></div></div></div></div>')
      i++;
    });
     $(document).on('click', '.btn_remove_multi', function(){  
           var button_id = $(this).attr("id");   
           $('#multirow'+button_id+'').remove();  
           i--;
    }); 
     $(document).on('click', '.remove_multi_option', function(){
          var button_id = $(this).attr("id");   
          $('#multiop'+button_id+'').remove();  
    });

  }) 
  function addMultiOption(val){
      $('#multiOption'+val+'').append('<div id="multiop'+val+'" class="form-group"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="checkbox"></span></div><input type="text" name="option['+val+'][]" class="form-control"><input type="button" value="x" id="'+val+'" class="btn btn-warning remove_multi_option"></div></div></div></div>')
     }

  $(document).ready(function(){

    $('#open').on('click', function(){

      $('#form').append('<div id="openrow'+i+'"><div class="col-sm-5"><div class="form-group"><label>Open Question</label><div class="input-group"> <input type="hidden" name="questionType[]" value="open" class="form-control"> <input type="text" name="question[]" class="form-control" placeholder="Enter ..."><input type="button" value="x" id="'+i+'" class="btn btn-primary btn_remove_open"></div></div></div></div>')
      i++;
    });
     $(document).on('click', '.btn_remove_open', function(){
          var button_id = $(this).attr("id");   
          $('#openrow'+button_id+'').remove();  
          i--;
    });
  })   
</script>
</html>
