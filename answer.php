<?php
	require_once 'connect.php';
	session_start();
	$_SESSION['view_question_id'] = $_POST['id'];
	if(isset($_POST['answer']))
		$answer = mysql_real_escape_string($_POST['answer']);
	$fail = validate_answer($answer);
	if($fail!="")
	{
		echo $fail;
	}
	else
	{
		$author = $_SESSION['id'];
		$questionId = $_POST['id'];
		$query = "INSERT INTO answers(content,answer_date,question_id,author) 
			VALUES('$answer',NOW(),'$questionId','$author')";
		$result=$connection->query($query) or die($connection->error);
    	if(!$result)
    	{
    		echo "error occured while inserting data";
   		}
   		//$_SESSION['view_question_id']=$questionId;
   		//$result->close();
   		
   		echo "HELLO";
   		header("location: main.php");
   		die();
	}

	function validate_answer($answer)
	{
   		if($answer!="")
      		return "";  
   		else
      		return "No text entered!"; 
	}
?>