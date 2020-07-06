<?php 

require 'db.php';


// $obj->debug($form);  

?>

 
<html>
    <head>
       <title>..</title>
  
  <style>
  
         #header h1{
           margin-top: -4rem;
           margin-bottom: 2rem;
           margin-left: 9rem;
         }
          body{
          font-size: 12px;
          font-family: "verdana", Geneva, sans-serif;

         }
         th{
          font-weight: bold;
          font-size: 13px;
          padding-left:  4px;
          text-align: left;
         }
         #service td{
          border:solid 1px;
          padding: 2px;
          font-size: 12px;
          /*border-left: none;
          border-top: none;
          border-right: none;*/

         }
         #headingTable th{
          text-align: left;
          font-size: 13px;
         }

         #headingTable td{
          text-align: left;
          font-size: 12px;
         }
         table{
          border-collapse: collapse;
            border: 1px;
         }
  body{
    margin: 5px;
    
  }
</style>
    </head>
    <center>
    <body>
        <!-- Define header and footer blocks before your content -->
        <!-- Wrap the content of your PDF inside a main tag -->
        <div id="header">
         <!--  <img src="" width="100px" height="100px"/> -->
          <center><img src="img/logo.png" width= "20%" height="100px"  /></center>
          <?php if (isset($_POST['report'])){ ?>
            <h3><u><b>Survey Forms Details</b></u></h3>
          <?php }elseif (isset($_POST['FBreport'])) {?>
            <h3><u><b>Feedback Report which Form have how many feedbacks</b></u></h3>
          <?php } ?>
           
     
        </div>
        <!-- <hr style="border: 1px solid black; width: 98%" /> -->
        <!-- <div>
       <table style="width:90%" id="headingTable" >
          <tr>
            <th >Student Name:</th><td style="font-weight: bold;"><?php echo $shistory[0]['sName'] ?></td>
            <th>Father Name</th><td style="font-weight: bold;"><?php echo $shistory[0]['sFName']?></td>
            <th>Roll #:</th><td style="font-weight: bold;"><?php echo $shistory[0]['batchYear']."-".$shistory[0]['deptShortName']."-".$shistory[0]['sRollNo']?></td>
          </tr>
          <tr>
            <th >From: </th><td style="font-weight: bold;"><?php echo $_POST['date1'] ?></td>
            <th>To: </th><td style="font-weight: bold;"><?php echo $_POST['date2'] ?></td>
            <th>Today's Date: </th><td style="font-weight: bold;"><?php echo date("Y-m-d")?></td>
          </tr>
          </table>
        </div> -->
        <hr style="border: 1px solid black; width: 98%" />
      <div>
      </div>
    
       

        <br>
        <?php if (isset($_POST['report'])) {
           
               $form = $obj->numberOfQuestion($_POST); ?>
         

          <table style="width:90%; class="table table-striped table-bordered table-hover" id="service">
          <thead>
              <tr>
                <th>#</th>
                <!-- <th>Form</th> -->
                <th>Form Title </th>
                <th>Total of Questions</th>
                <th>Form Created Date</th>
                <th>Form Created Time</th>

               

              </tr>
          </thead>
          <tbody>
            <?php  $counter = 1;
              foreach ($form as $key => $value) { 
                 ?>
              <tr>
                <td><?php echo $counter; ?></td>
                <!-- <td><?php echo $value['formId']?></td> -->
                <td><?php echo $value['formTitle'] ?></td>
                <td><?php echo $value['totalQuestion'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['time'] ?></td>

              </tr>
           <?php $counter++; } ?>
           </tbody>
      </table>
        


        <?php }elseif (isset($_POST['fbOpReport'])) {
          $formData = $obj->feedbackReportForm($_POST);
          $queData = $obj->feedbackReportQuestion($_POST);
          $fbData = $obj->countOptionFb($_POST);
            // $obj->debug($fbData);
            // $obj->debug($_POST);  
          ?>
          <table style="width:90%" id="headingTable" >
                          <tr>
                            <th>SELECT FORM</th>
                          </tr>
                  <?php foreach ($formData as $key => $value): ?>    
                        <tr>
                          <td><?=$value['formTitle']?></td>
                        </tr>
                  <?php endforeach ?>
           </table>
           <br>

           <table style="width:90%" id="headingTable" >
                          <tr>
                             <th>SELECT QUESTION</th>
                          </tr>
                  <?php foreach ($queData as $key => $value): ?>    
                        <tr>
                          <td><?=$value['formQuestionTitle']?></td>
                        </tr>
                  <?php endforeach ?>
           </table>
<br>
           <table style="width:90%; class="table table-striped table-bordered table-hover" id="service">
          <thead>
              <tr>
                <?php foreach ($fbData as $key => $value): ?>
                   <th><?php echo $value['QOptionTitle'] ?></th>
              
                  

                <?php endforeach ?>
                 <th>Total Feedback</th>

              </tr>
          </thead>
          <tbody>
               <tr>

            <?php $sum = 0;  $counter = 1;
              foreach ($fbData as $key => $value) {  ?>
                <td><?php echo $value['opFb'] ?></td>
                 <td style="display:none;"><?php $sum+= $value['opFb']; ?></td>
           <?php $counter++; }?>
                 <td ><?=$sum?></td>
              </tr>
              <tr>
                <?php  $counter = 1;
              foreach ($fbData as $key => $value) {  ?>

                <td><?php echo $value['opFb']."|".$sum; ?></td>
                 
           <?php $counter++; }?>
              </tr>
           </tbody>
      </table>



        <?php }elseif (isset($_POST['fbOpReport'])) {?>

          <table style="width:90%; class="table table-striped table-bordered table-hover" id="service">
          <thead>
              <tr>
                <th>#</th>
                <!-- <th>Form</th> -->
                <th>Form Title </th>
                <th>Total of Questions</th>
                <th>Total Number of Feedback on this form</th>
                <th>Feedback Created Date</th>
                <th>Feedback Created Time</th>

               

              </tr>
          </thead>
          <tbody>
            <?php  $counter = 1;
              foreach ($feedback as $key => $value) { 
                 ?>
              <tr>
                <td><?php echo $counter; ?></td>
                <!-- <td><?php echo $value['formId']?></td> -->
                <td><?php echo $value['formTitle'] ?></td>
                

                <td><?php echo $value['totalQuestion'] ?></td>
                <td><?php echo $value['totalFb'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><?php echo $value['time'] ?></td>
              </tr>
           <?php $counter++; }?>
           </tbody>
      </table>

        <?php }  ?>
          






      <br>

    </body> 
  </center>
</html>
