<?php 

require 'db.php';

// if (isset($_POST)) {
//   $obj->debug($_POST);
// }
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
      
        <div id="header">
         <!--  <img src="" width="100px" height="100px"/> -->
          <center><img src="img/logo.png" width= "20%" height="100px"  /></center>
         <!--  <?php if (isset($_POST['report'])){ ?>
            <h3><u><b>Survey Forms Details</b></u></h3>
          <?php }elseif (isset($_POST['FBreport'])) {?>
            <h3><u><b>Feedback Report which Form have how many feedbacks</b></u></h3>
          <?php } ?> -->
           
     
        </div>
        <!-- <hr style="border: 1px solid black; width: 98%" /> -->
      
        <hr style="border: 1px solid black; width: 98%" />
    
    
       

        <br>
        <?php if (isset($_POST['OptionT'])) {
            // $obj->debug($_POST);
                  $selectedOption =  $_POST['OptionTitles'];
                   $selectOptionlen = count($selectedOption);
                  // $obj->debug($selectedOption);
                
               // $form = $obj->numberOfQuestion($_POST); 
                $op = $obj->forthReportData($_POST);

                // $obj->debug($op);
               ?>
         
          <table style="width:90%;" class="table table-striped table-bordered table-hover" id="service">
          <thead>
              <tr>
 
                <!-- <th>Form</th> -->
                <th>Form Title </th>
                <th>Question Questions</th>
                <th>Option Id</th>
                <th>Option Title</th>
                <th>Feedback</th>
                <th>User</th>

               

              </tr>
          </thead>
          <tbody>
            <?php $myloopCounter = 0;
              $counter = 1;
              $selectedEmail = $op[0]['user_email'];

              foreach ($op as $key => $value) { 
                
                if ($myloopCounter <= $selectOptionlen && $selectedEmail == $value['user_email']) { 
               echo $myloopCounter;
                 ?>
              <tr>

             
                <td><?php echo $value['formTitle'] ?></td>
                <td><?php echo $value['formQuestionTitle']?></td>
                <td><?php echo $value['QOptionId']?></td>
                <td><?php echo $value['QOptionTitle'] ?></td>
                <td><?php if (isset($value['QOptionTitle'])) {
                  echo "Yes";
                } ?></td>
                <td><?php echo $value['user_email'] ?></td>
               
              </tr>
           <?php}
            else{ ?>
                <tr>
               
                  <td><?php echo $value['formTitle'] ?></td>
                  <td><?php echo $value['formQuestionTitle']?></td>
                  <td><?php echo $value['QOptionId']?></td>
                  <td><?php echo $value['QOptionTitle'] ?></td>
                  <td><?php if (isset($value['QOptionTitle'])) {
                    echo "NO";
                  } ?></td>
                  <td><?php echo $value['user_email'] ?></td>
              </tr>
           <?php } 

            }
            if ($myloopCounter == $selectOptionlen ) {
              $myloopCounter == 1;
              $selectedEmail = $op[1]['user_email'];
              
            } $myloopCounter++;  ?>
           </tbody>
      </table>

      <table>
      <?php foreach ($_POST['OptionTitles'] as $key => $value): ?>
        
      <?php endforeach ?>
        <tr>
          <td></td>
        </tr>
      </table>
        


        <?php }?>
        

          


          






      <br>

    </body> 
  </center>
</html>
