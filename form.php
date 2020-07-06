<?php 
require 'db.php';
 
$formData = $obj->getForms();
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
              
                <h3 class="card-title"> <?php echo $formData[0]['formTitle']; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="process.php">
                  <!-- <div id="form"> -->
                    <div id="form" class="card-body">
                      <?php foreach ($formData as $key => $value): ?>
                        <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1"><?php echo $value['formQuestionTitle']; ?></label>
                          <?php if ($formData[$key]['questionType'] == 'single'){ ?>
                            <?php $options = $obj->getOption($value['questionId']); 
                                  foreach ($options as $key => $value) {?>
                                      <div class="form-group">
                                        <div class="custom-control custom-radio">
                                          <input class="control-input" type="radio"  name="customRadio">
                                          <label for="customRadio1"><?=$value['QOptionTitle']?></label>
                                        </div>
                                      </div>
                            <?php  }?>
                          <?php }elseif ($formData[$key]['questionType'] == 'multi') {?>
                          <?php $options = $obj->getOption($value['questionId']); 
                                  foreach ($options as $key => $value) {?>
                                      <div class="form-group">
                                        <div class="custom-control custom-radio">
                                          <input class="control-input" type="checkbox"  name="customRadio">
                                          <label for="customRadio1"><?=$value['QOptionTitle']?></label>
                                        </div>
                                      </div>
                            <?php  }?>
                       <?php }elseif ($formData[$key]['questionType'] == 'open') {?>
                                      <div class="form-group">
                                     <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                      </div>
                       <?php } ?>
                        </div>
                        </div>
                      <?php endforeach ?>
                      
                      
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

</html>
