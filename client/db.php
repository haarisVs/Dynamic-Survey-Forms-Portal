<?php 
/**
 * 
 */
session_start();
class Mydb 
{
	
	private $conn = '';

	public function Mydb($host='localhost', $username="root", $password="", $db="cell")
	{
		$this->conn = new mysqli($host,$username,$password,$db) or die("connection field");
		mysqli_set_charset($this->conn,"utf8");
	}


	

	

	public function Hacking_away($string)
	{
		return mysqli_real_escape_string($this->conn,$string);

	}

	public function Validation_Of_Log_in_user_name($username){
		$Query = "SELECT * FROM admin WHERE ad_status = 'y' and ad_username = '".$username."'"; 
   	 
		$res = $this->conn->query($Query);
		if ($res->num_rows>0) {
		
		$data = $res->fetch_assoc();
		$user_name_db = $data['ad_username'];

		if ($user_name_db != $username) {
			
			return false;
		}else{
			return true;
		}
	}
}


	public function Validation_Of_Log_in_user_password($password)
	{
		$Query = "SELECT * FROM admin WHERE ad_status = 'y' and ad_password ='".$password."'";
		$res = $this->conn->query($Query);

		if ($res->num_rows>0) {
			$data = $res->fetch_assoc();
			$user_pass_db = $data['ad_password'];

			if ($user_pass_db != $password) {
				return false;
			}else{
				return true;
			}
		}
	}

	public function registerClientwithLocation($data){
		extract($data);
		$Query = "INSERT INTO user(user_name, user_email, username, password, user_number, lat, lon) VALUES ('$user_name', '$user_email', '$username', '$password', '$user_number', '$lat', '$lon')";
		$res = $this->conn->query($Query);
		return $res;
	}


	public function client_login($data)
	{
		extract($data);
		$Query = "SELECT * FROM user WHERE username = $this->Hacking_away('$clientUsername') AND password  = $this->Hacking_away('$clientPassword') AND user_status = 'y' ";
		$res = $this->conn->query($Query);

		if($res->num_rows > 0)
			{
				$fetch = $res->fetch_assoc();
			//$_SESSION['user'] = $fetch['user_name'];
				return $fetch;
			}
			else
			{
				return false;
			}
	}


	public function create_session($data)
	{
		$_SESSION['client'] = $data;
	}

	public function is_login()
	{
			if (!$_SESSION['client']) {
				header("location:index.php");
			}
			// if (isset($_SESSION['timeout'])) {
			// 	# code...
			// }
	}
	public function logout()
	{
		session_unset();
		session_destroy();
		header('location:index.php');
	}

	





























	public function addForm($data){
		extract($data);

		$Query1 = "INSERT INTO form(formTitle) VALUES ('$fromTitle')";
		$res = $this->conn->query($Query1);
		$form_lastId = $this->conn->insert_id;
			
		
		for ($i=0; $i<count($questionType); $i++) { 
			$Query2 = "INSERT INTO questions(formId, questionType) VALUES ('$form_lastId','$questionType[$i]')";
				$res = $this->conn->query($Query2);
				$QuestionType_lastId = $this->conn->insert_id;
				if ($QuestionType_lastId) {
					$Query3 = "INSERT INTO formquestion(formId, questionId, formQuestionTitle) VALUES ('$form_lastId','$QuestionType_lastId', '$question[$i]')";
					$res = $this->conn->query($Query3);
					$QuestionTitle_lastId = $this->conn->insert_id;
					if ($QuestionTitle_lastId) {
						foreach ($option[$i] as $key => $value) {
							$Query4 = "INSERT INTO questionoptions(formQuestionId, QOptionTitle) VALUES ('$QuestionTitle_lastId','$value')";
								$ress = $this->conn->query($Query4);
						}
					}
				}
		}

		
		return $ress;
		
	}

	public function getForms($id){
		// $page =isset($_GET['page']) ? $_GET['page'] : 1;
		// $start = ($page - 1) * $limit;

		$Query = "SELECT form.formId, form.formTitle, questions.questionType, formquestion.questionId, formquestion.formQuestionId, formquestion.formQuestionTitle FROM form
		INNER JOIN questions ON (form.formId = questions.formId)
		INNER JOIN formquestion ON (questions.questionID = formquestion.questionId)
		-- INNER JOIN questionoptions ON (formquestion.formQuestionId = questionoptions.formQuestionId)
		WHERE form.formStatus='y' AND questions.questionStatus = 'y' AND form.formId ='$id'";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function getOption($id){
		$Query = "SELECT QOptionId, QOptionTitle FROM questionoptions
		WHERE formQuestionId ='$id' AND QOptionStatus = 'y'";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function counctRecords(){
		$Query = "SELECT count(formId) AS total FROM form
				 WHERE formStatus = 'y'";
		$res = $this->conn->query($Query);
			if ($res->num_rows > 0) 
			{
				$fetch = $res->fetch_assoc();
				return $fetch['total'];
			}
			else
			{
				return false;
			}
	}
	
	public function formRecord(){
		$Query = "SELECT 
		form.formId, form.formTitle, 
		count(questions.questionType) as questions, 
		sum(questions.questionType = 'single') as single,
		sum(questions.questionType = 'multi') as multi,
		sum(questions.questionType = 'open') as open FROM form
		INNER JOIN questions ON (form.formId = questions.formId)
		WHERE form.formStatus = 'y' GROUP BY form.formId" ;
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function fetchDataForUpdate($id){
		// $page =isset($_GET['page']) ? $_GET['page'] : 1;
		// $start = ($page - 1) * $limit;

		$Query = "SELECT form.formId, form.formTitle, questions.questionType, formquestion.FormQuestionId,
		formquestion.questionId, formquestion.formQuestionTitle FROM form
		INNER JOIN questions ON (form.formId = questions.formId)
		INNER JOIN formquestion ON (questions.questionID = formquestion.questionId)
		-- INNER JOIN questionoptions ON (formquestion.formQuestionId = questionoptions.formQuestionId)
		WHERE form.formStatus='y' AND questions.questionStatus = 'y' AND formquestion.formQuestionStatus = 'y' AND form.formId ='$id'";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	

	public function updateFormData($data){
	extract($data);
	$form_lastId = $formId[0];
		$Query = "UPDATE form SET 
		formTitle 	= '$formTitle[0]'
		WHERE formId = '$formId[0]' AND formStatus = 'y'";
		$fUPDATE = $this->conn->query($Query);

		if ($fUPDATE) {
			foreach (array_combine($FormQuestionId, $formQuestionTitle) as $id => $title) {
					$Query = "UPDATE formquestion SET 
					formQuestionTitle 	= '$title'
					WHERE formQuestionId = '$id' AND formQuestionStatus = 'y'";
					$res2 = $this->conn->query($Query);
			}
			foreach (array_combine($QOptionId, $QOptionTitle) as $optId => $optTitle) {
					$Query = "UPDATE questionoptions SET 
					QOptionTitle 	= '$optTitle'
					WHERE QOptionId = '$optId' AND QOptionStatus = 'y'";
					$res2 = $this->conn->query($Query);
			}
		}

		if(isset($newoptionQID)) {
			for ($i=0; $i<count($newoptionQID); $i++) { 
				 $Query4 = "INSERT INTO questionoptions(formQuestionId, QOptionTitle) VALUES ('$newoptionQID[$i]','$newoptionValue[$i]')";
				 $ress = $this->conn->query($Query4);
			}
		}
		if (isset($questionType)) {
			
			for ($j=0; $j<count($questionType); $j++) { 
			$Query2 = "INSERT INTO questions(formId, questionType) VALUES ('$form_lastId','$questionType[$j]')";
				$res = $this->conn->query($Query2);
				$QuestionType_lastId = $this->conn->insert_id;
				if ($QuestionType_lastId) {
					$Query3 = "INSERT INTO formquestion(formId, questionId, formQuestionTitle) VALUES ('$form_lastId','$QuestionType_lastId', '$question[$j]')";
					$res = $this->conn->query($Query3);
					$QuestionTitle_lastId = $this->conn->insert_id;
					if ($QuestionTitle_lastId) {
						if (!empty($option[$j])) {
							foreach ($option[$j] as $key => $value) {
							$Query4 = "INSERT INTO questionoptions(formQuestionId, QOptionTitle) VALUES ('$QuestionTitle_lastId','$value')";
								$ress = $this->conn->query($Query4);
							}
						}
						
					}
				}
		}
		}
		return true;
	}

	public function FormDelete($data){
		extract($data);

		$Query = "UPDATE form SET formStatus = 'n'
		WHERE formId = '$formId'";
		$res = $this->conn->query($Query);
		return $res;
	}

	public function adddUserFeedback($data){
		extract($data);
		// $Query = "INSERT INTO `user`(`user_name`, `user_email`, `user_number`, `user_address`, `user_city`) VALUES ('$user_name', '$user_email', '$user_number', '$user_address', '$user_city')";
		// $res = $this->conn->query($Query);
		// $user_Id = $this->conn->insert_id;
		if ($user_Id) {
			
			for ($i=0; $i<count($QuestionId); $i++) { 
				if (!empty($review[$i])) {
					$review=$review[$i][$i];
					// foreach (!empty($optId[$i]) as $key => $optAns) {
					$Query = "INSERT INTO `feedback`(`fb_userId`, `fb_formId`, `fb_questionId`, `fd_reviewq`) VALUES ('$user_Id','$formId', '$QuestionId[$i]','$review')";
						$res = $this->conn->query($Query);
					// }
				}
				else{

					foreach ($optId[$i] as $key => $optAns) {
					$Query = "INSERT INTO `feedback`(`fb_userId`, `fb_formId`, `fb_questionId`, `fb_ans`) VALUES ('$user_Id','$formId', '$QuestionId[$i]', '$optAns')";
						$res = $this->conn->query($Query);
					}
				}
			}	
		}
		return true;

	}

	public function viewUserFeedBack(){
		$Query = "SELECT  user.user_id, user.user_name, user.user_email, 
		user.user_number, user.user_address, user.user_city, form.formId, form.formTitle FROM user
		INNER JOIN feedback ON (user.user_id = feedback.fb_userId)
		INNER JOIN form ON (feedback.fb_formId = form.formId)
		-- LEFT JOIN formquestion ON (feedback.fb_questionId = formquestion.formQuestionId)
		-- LEFT JOIN questionoptions ON (feedback.fb_ans = questionoptions.QOptionId)
		-- INNER JOIN formquestion ON (fb_)
		WHERE user.user_status = 'y' GROUP BY user.user_Id ";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function userFeedbackQuestion($id){
		$Query = "SELECT feedback.fb_formId, feedback.fb_questionId, 
		formquestion.formQuestionTitle FROM feedback
		INNER JOIN formquestion ON (feedback.fb_questionId = formquestion.formQuestionId) 
		WHERE feedback.fb_formId = '$id' GROUP BY feedback.fb_questionId";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function userFeedbackOption($id){
		$Query = "SELECT feedback.fb_questionId, feedback.fb_ans, 
		questionoptions.QOptionTitle, feedback.fd_reviewq FROM feedback
		LEFT JOIN questionoptions ON (feedback.fb_ans = questionoptions.QOptionId)
		WHERE feedback.fb_questionId = '$id'";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function deleteFormAddedQuestion($id){
		foreach ($id as $key => $value) {
			$Query1 = "UPDATE formquestion SET formQuestionStatus = 'n'
		WHERE formQuestionId = '$value'";
		$res = $this->conn->query($Query1);
		// $Query2 = "UPDATE questionoptions SET QOptionStatus = 'n'
		// 		WHERE formQuestionId = '$value'";
		// 		$res = $this->conn->query($Query2);
				return $res;
		}	
	}

	public function deleteFormAddedOption($id){
		foreach ($id as $key => $value) {
			$Query2 = "UPDATE questionoptions SET QOptionStatus = 'n'
		 		WHERE QOptionId = '$value'";
				$res = $this->conn->query($Query2);
				return $res;
		}	
	}

	public function numberOfQuestion($data){
		extract($data);
		$Query="SELECT form.formId, form.formTitle, 
		date_format(form.formDate, '%b %d, %Y') as 'date',
		date_format(form.formDate, '%h:%i%p') 'time',
		count(DISTINCT formquestion.formQuestionId) AS totalQuestion FROM form
		INNER JOIN formquestion ON (form.formId = formquestion.formId)
		WHERE form.formStatus = 'y' AND form.formDate BETWEEN '$date1' AND '$date2'  GROUP BY form.formId";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;

	}

	// public function numberOfFeebback($date1, $date2){
	public function numberOfFeebback($data){
		extract($data);
		$Query="SELECT form.formId, form.formTitle, 
		date_format(feedback.fb_date, '%b %d, %Y') as 'date',
		date_format(feedback.fb_date, '%h:%i%p') 'time',
		count(DISTINCT formquestion.formQuestionId) AS totalQuestion,
		count(DISTINCT feedback.fb_userId) AS totalFb FROM form
		INNER JOIN formquestion ON (form.formId = formquestion.formId)
		INNER JOIN feedback ON (form.formId = feedback.fb_formId)
		WHERE feedback.fb_status = 'y' AND feedback.fb_date BETWEEN '$date3' AND '$date4' GROUP BY form.formId";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function fetchFormList(){
		$Query ="SELECT * FROM form 
		WHERE formStatus = 'y'";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function fetchQuestionList($fId){
		// extract($fId);
		$formId = implode("','",$fId);
		$Query = "SELECT formQuestionId, formId, formQuestionTitle FROM formquestion
		WHERE formId IN ('$formId')  AND formQuestionStatus ='y'";
		$res = $this->conn->query($Query);
		$i=0;
		while($data = $res->fetch_assoc())
	    {
	      $array[$i]['formId'] = $data['formId'];
	      $array[$i]['formQuestionId'] = $data['formQuestionId'];
	      $array[$i]['formQuestionTitle'] = $data['formQuestionTitle'];
	      $i++;

	    }
	    echo json_encode($array);
	    return true;

	}

	public function fetchOptionsList($QId){
		$QuesId = implode("','",$QId);
		$Query = "SELECT QOptionId, QOptionTitle FROM questionoptions
		WHERE formQuestionId IN ('$QuesId') AND QOptionStatus ='y'";
		$res = $this->conn->query($Query);
		$i=0;
		while($data = $res->fetch_assoc())
	    {
	      $array[$i]['QOptionId'] = $data['QOptionId'];
	      $array[$i]['QOptionTitle'] = $data['QOptionTitle'];
	      $i++;

	    }
	    echo json_encode($array);
	    return true;

	}

	public function feedbackReportForm($data){
		extract($data);
		$formId = implode("','",$FormId);
		$Query = "SELECT * FROM form
		WHERE formId IN ('$formId') AND formStatus = 'y'";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}
	public function feedbackReportQuestion($data){
		extract($data);
		$QId = implode("','",$QId);
		$Query = "SELECT * FROM formquestion
		WHERE formQuestionId IN ('$QId') AND formQuestionStatus = 'y'";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}


	public function countOptionFb($data){
		extract($data);
		$OId = implode("','",$OId);
		$Query = "SELECT questionoptions.QOptionTitle,
		count(feedback.fb_ans) AS opFb 
		FROM questionoptions
		INNER JOIN feedback ON (questionoptions.QOptionId = feedback.fb_ans)
		WHERE questionoptions.QOptionId IN ('$OId') AND questionoptions.QOptionStatus = 'y' GROUP BY feedback.fb_ans ";
		$res = $this->conn->query($Query);
		$i = 0;
			$a = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$a[$i][$key] = $value;
				}
				$i++;
			}
			return $a;
	}

	public function getFormName(){
		$Query = "SELECT formTitle FROM form
		WHERE formStatus ='y'";
		$res = $this->conn->query($Query);
		$i=0;
		$one=[];
		while($data = $res->fetch_assoc())
	    {
	    	extract($data);
	      $one[] = $formTitle;
	      $i++;

	    }
	    echo json_encode($one);
	    return true;
	}



	public function countQuestion(){
		$Query = "SELECT count(`formQuestionTitle`) as totalQ 
		FROM formQuestion 
		WHERE formQuestionStatus ='y' GROUP BY formId";
		$res = $this->conn->query($Query);
		$i=0;
		$one=[];
		while($data = $res->fetch_assoc())
	    {
	    	extract($data);
	      $one[] = (int)$totalQ;
	      $i++;

	    }
	    echo json_encode($one);
	    return true;

	}

	public function countFbDatewise(){
		$Query = "SELECT count(DISTINCT fb_userId) as fb, date_format(fb_date, '%b %d') as 'date' FROM feedback
		WHERE fb_status = 'y' GROUP BY date_format(fb_date, '%b %d, %Y')";
		$res = $this->conn->query($Query);
		$i=0;
		$one=[];
		$dt = [];
		while($data = $res->fetch_assoc())
	    {
	    	extract($data);
	      // $one[] = (int)$fb;
	      $dt[] = $date; 
	      $i++;

	    }
	    // echo json_encode($one);
	    echo json_encode($dt);

	    return true;

	}


	public function countFb(){
		$Query = "SELECT count(DISTINCT fb_userId) as fb, date_format(fb_date, '%b %d') as 'date' FROM feedback
		WHERE fb_status = 'y' GROUP BY date_format(fb_date, '%b %d, %Y')";
		$res = $this->conn->query($Query);
		$i=0;
		$one=[];
		$dt = [];
		while($data = $res->fetch_assoc())
	    {
	    	extract($data);
	      $one[] = (int)$fb;
	      // $dt[] = $date; 
	      $i++;

	    }
	    echo json_encode($one);
	    // echo json_encode($dt);

	    return true;
		}

		public function QuestionsOptionGraph(){

			$Query = "SELECT questionoptions.QOptionTitle, count(feedback.fb_ans) feedb FROM questionoptions
			INNER JOIN feedback ON (questionoptions.QOptionId = feedback.fb_ans)
			WHERE questionoptions.QOptionStatus = 'y'  GROUP BY questionoptions.QOptionId";
			$res = $this->conn->query($Query);
			$i=0;
			$one=[];
			$dt = [];
				while($data = $res->fetch_assoc())
			    {
			    	extract($data);
			      $one[$i]['name'] = (string)$QOptionTitle;
			      $one[$i]['y'] = (int)$feedb;
			      // $dt[] = $date; 
			      $i++;

			    }
			    echo json_encode($one);
			    // echo json_encode($dt);

			    return true;
		}
	// public function find_cities_by_province_id($pid)
	// {
	// // echo $aid;


	// $array = array();
	// $Query = "SELECT * FROM place 
	// 	WHERE pStatus = 'y' AND pproId = '".$pid."'";    
	
	// $res = $this->conn->query($Query) or die(mysqli_error($this->conn));
	// $i=0;
	// while($data = $res->fetch_assoc())
 //    {
 //      $array[$i]['pId'] = $data['pId'];
 //      $array[$i]['pName'] = $data['pName'];
 //      $i++;

 //    }
 //    echo json_encode($array);
 //    return true;


	
	// }

	public function debug($arg){
		echo "<pre>";
		print_r($arg);
		echo "<pre>";
	}




	// public function addSingleChoiceQuestion($data)
	// {
	// 	extract($data);
	// 	$Query = "INSERT INTO scq(scq_q, scq_type) values ('$scq','$package')";
	// 	$res = $this->conn->query($Query);
	// 	if ($res) {
	// 		$lastId = $this->conn->insert_id;
	// 		if (isset($sco_op)) 
	// 		{
	// 	      	foreach ($sco_op as $key => $value) 
	// 	      	{
	// 		        if (!empty($value)) 
	// 		        {
	// 		         	$success = $this->addSingleChoiceOption($lastId,$value);
	// 		        }
	// 		        else
	// 		        {
	// 		          break;
	// 		        }
	// 	     	}
	// 	    }
	// 	}
	// 	return $success;
	// }

	// private function addSingleChoiceOption($id,$value){
	// 	$Query = "INSERT INTO sco(sco_op, scq_id) values ('$value','$id')";
	// 	$res = $this->conn->query($Query);
	// 	return $res;
	// }

	// public function fetchSingleChoiceQuestions(){
	// 	// if (isset($_GET['feedback'])  ? $pk_type = $_GET['feedback'] : header('location:index.php?feedback=daily'));

	// 	// $pk_type = $_GET['feedback'];
	// 	$Query = "SELECT * FROM scq
	// 	WHERE scq_status = 'y' AND scq_type = '$pk_type'";
		
	// 	$res = $this->conn->query($Query);
	// 	$i = 0;
	// 		$a = array();
	// 		while ($rows = $res->fetch_assoc()) {
	// 			foreach ($rows as $key => $value) {
	// 				$a[$i][$key] = $value;
	// 			}
	// 			$i++;
	// 		}
	// 		return $a;
	// }
	// public function fetchSingleChoiceOption($id){
	// 	$Query = "SELECT sco_op FROM sco
	// 	WHERE scq_id = '$id'";
	// 	$res = $this->conn->query($Query);
	// 	$i = 0;
	// 		$a = array();
	// 		while ($rows = $res->fetch_assoc()) {
	// 			foreach ($rows as $key => $value) {
	// 				$a[$i][$key] = $value;
	// 			}
	// 			$i++;
	// 		}
	// 		return $a;
	// }

	// public function addMultiChoiceQuestion($data)
	// {
	// 	extract($data);
	// 	$Query = "INSERT INTO mcq(mcq_q, mcq_type) values ('$mcq_q','$package')";
	// 	$res = $this->conn->query($Query);
	// 	if ($res) {
	// 		$lastId = $this->conn->insert_id;
	// 		if (isset($mco_op)) 
	// 		{
	// 	      	foreach ($mco_op as $key => $value) 
	// 	      	{
	// 		        if (!empty($value)) 
	// 		        {
	// 		         	$success = $this->addMultiChoiceOption($lastId,$value);
	// 		        }
	// 		        else
	// 		        {
	// 		          break;
	// 		        }
	// 	     	}
	// 	    }
	// 	}
	// 	return $success;
	// }

	// private function addMultiChoiceOption($id,$value){
	// 	$Query = "INSERT INTO mco(mco_op, mcq_id) values ('$value','$id')";
	// 	$res = $this->conn->query($Query);
	// 	return $res;
	// }

	// public function fetchMultiChoiceQuestions(){
	// 	// if (isset($_GET['feedback'])  ? $pk_type = $_GET['feedback'] : header('location:index.php?feedback=daily'));

	// 	// $pk_type = $_GET['feedback'];
	// 	$Query = "SELECT * FROM mcq
	// 	WHERE mcq_status = 'y' AND mcq_type = '$pk_type'";
		
	// 	$res = $this->conn->query($Query);
	// 	$i = 0;
	// 		$a = array();
	// 		while ($rows = $res->fetch_assoc()) {
	// 			foreach ($rows as $key => $value) {
	// 				$a[$i][$key] = $value;
	// 			}
	// 			$i++;
	// 		}
	// 		return $a;
	// }
	// public function fetchMultiChoiceOption($id){
	// 	$Query = "SELECT mco_op FROM mco
	// 	WHERE mcq_id = '$id'";
	// 	$res = $this->conn->query($Query);
	// 	$i = 0;
	// 		$a = array();
	// 		while ($rows = $res->fetch_assoc()) {
	// 			foreach ($rows as $key => $value) {
	// 				$a[$i][$key] = $value;
	// 			}
	// 			$i++;
	// 		}
	// 		return $a;
	// }

	// public function addOpenQuestion($data){
	// 	$dataa = $this->addslashes_recursive($data);
	// 	extract($dataa);
	// 	$Query = "INSERT INTO ocq(ocq_q, type) values ('$ocq_q','$package')";
	// 	$res = $this->conn->query($Query);
	// 	return $res;	
	// }

	// public function fetchOpenQuesiton(){
	// 	// if (isset($_GET['feedback'])  ? $pk_type = $_GET['feedback'] : header('location:index.php?feedback=daily'));
	// 	$Query = "SELECT ocq_q FROM ocq
	// 	WHERE type = '$pk_type'";
	// 	$res = $this->conn->query($Query);
	// 	$i = 0;
	// 		$a = array();
	// 		while ($rows = $res->fetch_assoc()) {
	// 			foreach ($rows as $key => $value) {
	// 				$a[$i][$key] = $value;
	// 			}
	// 			$i++;
	// 		}
	// 		return $a;
	// }

	// public function registerUser($data){
	// 	$dataa = $this->addslashes_recursive($data);
	// 	extract($dataa);
	// 	$Query = "INSERT INTO user(first_name, last_name, username, password, user_type) values ('$firstname','$lastname','$username', '$password', '$user_type')";
	// 	$res = $this->conn->query($Query);
	// 	return $res;	
	// }

	// private function addslashes_recursive( $data )
	// {
	//     if ( is_array( $data ) )
	//     {
	//         return array_map( 'addslashes', $data );
	//     }
	//     else
	//     {
	//         return addslashes( $data );
	//     }
	// }  

	// private function addQuestionType($formId, $questionType){
	// 	$Query = "INSERT INTO questions(formId, questionType) VALUES ('$formId','$questionType')";
	// 	$res = $this->conn->query($Query);
	// 	if ($res) {
	// 		return 	$QuestionType_lastId = $this->conn->insert_id;
	// 	}
	// 	else{
	// 		return  "Question Type insertion error";
	// 	}
	// }
	// private function addQuestionTitle($formId, $typeId, $questionTitle){
	// 	$Query = "INSERT INTO formquestion(formId, questionId, formQuestionTitle) VALUES ('$formId','$typeId', '$questionTitle')";
	// 	$res = $this->conn->query($Query);
	// 	if ($res) {
	// 		return 	$Title_lastId = $this->conn->insert_id;
	// 	}
	// 	else{
	// 		return  "Question Type insertion error";
	// 	}
	// }
	// private function addQuestionOptions($titleId, $options){
	// 	$Query = "INSERT INTO questionoptions(formQuestionId, QOptionTitle) VALUES ('$titleId','$options')";
	// 	$res = $this->conn->query($Query);
	// 	return $res;
	// }
}
$obj = new Mydb();