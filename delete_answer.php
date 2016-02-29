<?php
	require_once 'connect.php';
	if(isset($_SESSION['last_page_visited']))
	{
    	$url = $_SESSION['last_page_visited'];
	}
	else
	{
		$url = "main.php";
	}
	if(isset($_POST['id']))
	{
		$id = mysql_real_escape_string($_POST['id']);
		$query = "DELETE FROM answers WHERE id ='$id'";
		$result = $connection->query($query) or die($connection->error);
		if(!$result)
		{
		echo "something went wrong";
		}
		header("Location: $url");
		die();
	}
?>