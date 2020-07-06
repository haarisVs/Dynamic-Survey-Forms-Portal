<?php 
require 'db.php'; 
// $new = array();
$op = $obj->forthReportData();
$obj->debug($op);
// $op = $obj->fetchOptionUserLocation();
//  $obj->debug($op);
// $op = $obj->fetchOptionIDs();
//  $obj->debug($op);

// for ($i=0; $i <count($op); $i++) { 
// 	$data = $obj->getOptionQuantity($op[$i]);
// 	$new[] = (int)$data;
// }
// echo json_encode($new);




// $obj->debug($final);
// $op = $obj->fetchOptionNameForBarChart();
// $obj->debug($op);
// $op = $obj->QuestionsOptionGraph();
// $obj->debug($op);

// $totalfb = $obj->countFbDatewise();
// $obj->debug($totalfb);


// $totalQ = $obj->countQuestion();
// $obj->debug($totalQ);


  // $formName = $obj->getFormName();
// $FormId = array(1,2,3,4);
// $res2=  $obj->feedbackReportForm($FormId);
// $res = $obj->fetchQuestionList($fId);
// $obj->debug($res2);

// 	$res = $obj->fetchQuestionList(1);
// $obj->debug($res);

// $data = $obj->fetchFormList();
// $obj->debug($data);
// $p= array('date1' =>'2020-01-01' , 'date2'=>'2020-05-01');

// $data = $obj->numberOfQuestion($p);
// $obj->debug($data);
// $data = $obj->numberOfFeebback('2020-01-01','2020-05-01');
// $obj->debug($data);
// $data1 = $obj->numberofFeedbackPerForm(1);
// $obj->debug($data1);

// $data = $obj->viewUserFeedBack();

// $obj->debug($data);

// $final = $obj->userFeedbackQuestion(1);
// $obj->debug($final);
// $option = $obj->userFeedbackOption(3);
// $obj->debug($option);


// $data = $obj->adddUserFeedback($_POST);
// if ($data) {
// 	header('location:feedback.php');
// }
// else{
// 	echo "not inserted";
// }
// $formRecord = $obj->formRecord();
// $obj->debug($formRecord);

// $getForms = $obj->getForms(1); 
// $obj->debug($getForms);


// $options = $obj->getOption(2);
// $obj->debug($options);

// $data = $obj->fetchDataForUpdate(3);

// $response = array();
// $data = $obj->getForms();
// foreach ($data as $key => $value) {
// 	$data2 = $obj->getOption($value['questionId']);
	// foreach ($data2 as $key => $v) {
	// 	echo $v['QOptionTitle'];
	// }

	// $response[$key] = $data2;

// $questions = array();
// $data = $obj->fetchMultiChoiceQuestions();
// foreach ($data as $key => $value) {
// 	echo $value['mcq_q'];
// 	$option = $obj->fetchMultiChoiceOption($value['mcq_id']);
// 	foreach ($option as $key => $op) {
// 				echo $op['mco_op'];
// 	}
// }
// foreach ($data as $key => $value) {
// 		echo $value['scq_id'];
// 		$questions['ques'][$key] = $value['scq_q'];
// 		$option = $obj->fetchOption($value['scq_id']);
// 		foreach ($option as $key => $val) {
// 			// echo $value['sco_op'];
// 			$questions['option'][$key] .= $val['sco_op'];
// 		}
// }
// $questions = array();
// $data = $obj->fetchQuestions();
// $questions['ques'] = $data[0]['scq_q'];
// 	foreach ($data as $key => $value) {
// 			$qid = $value['scq_id'];
// 			// $option = $obj->fetchOption($qid);
// 			// foreach ($option as $key => $value) {
// 			// 	$questions['data'] = $value;
// 			// }
// 	}





// extract($_POST);
// foreach (array_combine($FormQuestionId, $formQuestionTitle) as $id => $title) {
// 	echo $formId[0]."=>".$id."=>".$title."<br>";
// }


// $obj->debug($response);

// $obj->debug($option);
// $obj->debug($questions);

// foreach ($questions as $key => $value) {
// 	echo $value['ques'][$key];
// }
?>