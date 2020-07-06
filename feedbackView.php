<?php 
require 'db.php';
$obj->is_login();
$formRecord = $obj->viewUserFeedBack();
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
      <div class="row">
        <div class="col-12">
         
          <!-- /.card -->

          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>User Email</th>
                  <th>Form Title</th>
                  <!-- <th>Total Questions</th>
                  <th>Single</th>
                  <th>Multi</th>
                  <th>Open</th> -->
                  <td></td>
                </tr>
                </thead>
                <tbody>

                	<?php $sr = 1; foreach ($formRecord as $key => $value){ ?>
                		<tr>
                			<td><?=$sr?></td>
                      <td><?=$value['user_email']?></td>
                			<td><?=$value['formTitle']?></td>
                			<!-- <td><?=$value['questions']?></td>
                			<td><?=$value['single']?></td>
                			<td><?=$value['multi']?></td>
                			<td><?=$value['open']?></td> -->
                			<td>
                				<a class="btn-sm btn-primary" data-toggle="modal" data-target="#modal-view-<?php echo $value['formId'] ?>" href=""><!-- <i class="fas fa-eye"></i> --> View Feedback</a>
                				
                				<div class="modal fade" id="modal-view-<?php echo $value['formId'] ?>"><?php $value['formId'];
                					$formData = $obj->getForms($value['formId']); 
                					?>

							        <div class="modal-dialog">
							          <div class="modal-content">
							            <div class="modal-header">
							              <h4 class="modal-title">	<?php echo $formData[0]['formTitle'];  ?></h4>
							              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                <span aria-hidden="true">&times;</span>
							              </button>
							            </div>
							            <div class="modal-body">
							            <form role="form" method="POST" action="debug.php">
                            <?php $questions = $obj->userFeedbackQuestion($formData[0]['formId']);
                                foreach ($questions as $key => $ques): ?>
                                <div class="col-sm-12">
                                  <div class="form-group">
                                         <label for="exampleInputEmail1"><?php echo $ques['formQuestionTitle']; ?></label>
                                         <?php
                                          $option = $obj->userFeedbackOption($ques['fb_questionId']);
                                          foreach ($option as $key => $op): ?>
                                            <div class="form-group">
                                                    <div class="custom-control custom-radio">
                                                    <!--   <input class="control-input" type="radio"  name="customRadio"> -->
                                                      <?php if (isset($op['QOptionTitle'])){ ?>
                                                         <i class="fa fa-check text-primary" aria-hidden="true" ></i> <label for="customRadio1"><?=$op['QOptionTitle']?></label>
                                                      <?php }else{ ?>
                                                               <i class="fa fa-check text-primary" aria-hidden="true" ></i><p><?=$op['fd_reviewq']?></p>
                                                              <!-- <textarea class="form-control" rows="3"><?=$op['fd_reviewq']?></textarea> -->
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                         <?php endforeach ?>
                                  </div>
                                </div>
                            <?php endforeach ?>
						                   
             					
							            </div>
							            <div class="modal-footer justify-content-between">
							              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							               <!-- <button type="submit" class="btn btn-primary" >Save changes</button> -->
							            </div>
                        </form>
							          </div>
							          <!-- /.modal-content -->
							        </div>
							        <!-- /.modal-dialog -->

							     </div>




















                				
                				


				            </td>		
                		</tr>
                	<?php $sr++; } ?>
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr> -->
                </tfoot>
              </table>
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
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function()
{
    $('.delete').click(function()
    {
        if (confirm("Are you sure you want to delete this row?"))
        {
          var element = this;
            // var id = $(this).parent().parent().attr('id');
            // // var data = id ;
            var parent = $(this).parent().parent();
          // console.log(data); 
            $.ajax(
            {     method:"POST",  
                  url:"deleteprocess.php",
                  data: {
                    "formId":$(element).attr('id'),
                                  },
                    cache: false,
                   success: function(status)
                   {
                    console.log(status)
                    parent.fadeOut('slow', function() {$(this).remove();});
                    // $( "#trows" ).load( "batchRecord.php #trows" );

                     // $("#datatable-4th").load(window.location + " #datatable-4th");
                   }
             });
        }
    });
 
    // style the table with alternate colors
    // sets specified color for every odd row
    $('.delete tr:odd').css('background',' #f23333');
});
</script>
</html>
