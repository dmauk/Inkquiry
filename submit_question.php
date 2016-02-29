<?php
require_once 'connect.php';
session_start();
if(isset($_POST['question']))
	$question = mysql_real_escape_string($_POST['question']);
	$title = mysql_real_escape_string($_POST['title']);
	$category = mysql_real_escape_string($_POST['category']);

$fail = validate_question($question);

if($fail!="")
{
	echo $fail;
	echo '<a href="textquestion.php">Try Again...</a>';
}
else
{
	$id = $_SESSION['id'];
	$query = "INSERT INTO questions(question,question_date,author,title,category)
        VALUES('$question',NOW(),'$id', '$title','$category')";
    $result=$connection->query($query) or die($connection->error);
    if(!$result)
    {
    	echo "error occured while inserting data";
    }
    header("location: main.php");
    $result->close();
    die();
}


function validate_question($question)
{
   if($question!="")
      return "";  
   else
      return "No text entered!"; 
}
?>
