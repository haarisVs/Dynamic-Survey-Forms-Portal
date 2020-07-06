<?php 
require 'db.php';
$obj->is_login();
 $id = $_GET['id'];
$formData = $obj->fetchDataForUpdate($id);


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
          </div>

          <div class="col-md-10">
            <div class="card card-warning">
              <div class="card-header">
              
                <h3 class="card-title"> <?php echo $formData[0]['formTitle']; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="updateprocess.php">
                  <!-- <div id="form"> -->
                  	<div class="col-sm-8">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Form Title</label>
                        <input class="form-control" type="hidden" name="formId[]" value="<?php echo $formData[0]['formId']; ?>">
                  			<input class="form-control" type="text" name="formTitle[]" value="<?php echo $formData[0]['formTitle']; ?>">
                        </div>
                      </div>
                  	
                    <div id="form" class="card-body">
                      <?php foreach ($formData as $key => $value): ?>
                        <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Question</label>
                          <div class="input-group">
                            <input class="form-control" type="hidden" name="FormQuestionId[]" value="<?php echo $value['FormQuestionId']; ?>">
                          <input class="form-control" type="text" name="formQuestionTitle[]" value="<?php echo $value['formQuestionTitle']; ?>"><input type="button" value="x" id="<?php echo $value['FormQuestionId']; ?>" class="btn btn-danger delete_question">
                          </div>
                           
                          <?php if ($formData[$key]['questionType'] == 'single'){ ?>

                            <?php $qID = $value['questionId'];
                             $options = $obj->getOption($value['questionId']); 
                                foreach ($options as $k => $value) {?>
                                <div  class="col-sm-6">
                         				<div  class="form-group">
                            				<div class="input-group">
                              				<div class="input-group-prepend">
                               				 	<span class="input-group-text">
                                		 			 <input type="radio">
                                				</span>
                              				</div>
                              				<input type="hidden" name="QOptionId[]" value="<?=$value['QOptionId']?>"  class="form-control"><input type="text" class="form-control" name="QOptionTitle[]" value="<?=$value['QOptionTitle']?>"><input type="button" value="x" id="<?php echo $value['QOptionId']; ?>" class="btn btn-danger delete_optionS">
                           					</div>
                          				</div>
                                  
                       			 	</div>
                                 
                                      
                            <?php  }?>
                                  <div id="single<?php echo $key;?>" class="col-sm-6">
                                    
                                  </div>
                            <div class="col-md-2">
                               <input  type="button" value="+" class="form-control btn btn-success" onclick="addOption(<?=$key;?>,<?=$qID;?>)">
                            </div>
                            
                          <?php }elseif ($formData[$key]['questionType'] == 'multi') {?>
                          <?php $qID = $value['questionId'];
                            $options = $obj->getOption($value['questionId']); 
                                  foreach ($options as $k => $value) {?>
                                      <div class="col-sm-6">
                         				<div class="form-group">
                            				<div class="input-group">
                              				<div class="input-group-prepend">
                               				 	<span class="input-group-text">
                                		 			 <input type="checkbox">
                                				</span>
                              				</div>
                              				<input type="hidden" name="QOptionId[]" value="<?=$value['QOptionId']?>"  class="form-control"><input type="text" class="form-control" name="QOptionTitle[]" value="<?=$value['QOptionTitle']?>"><input type="button" value="x" id="<?php echo $value['QOptionId']; ?>" class="btn btn-danger delete_optionS">
                           					</div>
                          				</div>
                       			 	</div>

                            <?php  }?>
                              <div id="single<?php echo $key;?>" class="col-sm-6">
                                    
                                  </div>
                            <div class="col-md-2">
                               <input  type="button" value="+" class="form-control btn btn-success" onclick="addOption(<?=$key;?>,<?=$qID;?>)">
                            </div>

                       <?php }elseif ($formData[$key]['questionType'] == 'open') {?>
                                      <div class="form-group">
                                    	
                                      </div>
                       <?php } ?>
                        </div>
                        </div>

                      <?php endforeach ?>
                      
                      
                    </div>
                  <!-- </div> -->
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="recordUpdate" class="btn btn-primary" value="submit">
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
<script type="text/javascript">
  $(document).ready(function()
{
    $('.delete_question').click(function()
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
                    "FormQuestionId":$(element).attr('id'),
                                  },
                    cache: false,
                   success: function(status)
                   {
                    console.log(status)
                    parent.fadeOut('slow', function() {$(this).remove();});
                      
                    // $('.delete_question').attr('id').reset();

                     // $("#datatable-4th").load(window.location + " #datatable-4th");
                   }
             });
        }
    });
 
    // style the table with alternate colors
    // sets specified color for every odd row
    $('.delete_question tr:odd').css('background',' #f23333');
});


$(document).ready(function()
{
    $('.delete_optionS').click(function()
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
                    "QOptionId":$(element).attr('id'),
                                  },
                    cache: false,
                   success: function(status)
                   {
                    console.log(status)
                    parent.fadeOut('slow', function() {$(this).remove();});
                      
                    // $('.delete_question').attr('id').reset();

                     // $("#datatable-4th").load(window.location + " #datatable-4th");
                   }
             });
        }
    });
 
    // style the table with alternate colors
    // sets specified color for every odd row
    $('.delete_optionS tr:odd').css('background',' #f23333');
});
</script>

<script type="text/javascript">
  function addOption(k,qId){
    alert(qId);
    $('#single'+k+'').append('<div id="new_op'+k+'" class="form-group"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio"></span></div><input type="text" name="newoptionQID[]" value="'+qId+'"  class="form-control"><input type="text" class="form-control" name="newoptionValue[]" value=""><input type="button" value="x" id="'+k+'" class="btn btn-danger remove_new_op"></div></div>');
  }
  $(document).on('click', '.remove_new_op', function(){
          var button_id = $(this).attr("id");   
          $('#new_op'+button_id+'').remove();  
          k--;
    });
</script>
</html>
<input type="text" name="newoptionQID" value="">