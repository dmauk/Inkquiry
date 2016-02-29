<?php
require_once 'connect.php';
session_start();
if(isset($_SESSION['last_page_visited']))
{
    $url = $_SESSION['last_page_visited'];
}
else
{
	$url = "main.php";
}
session_destroy();
if (isset($_POST['username']) and isset($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$salt1="eqQ1$";
	$salt2="ss##s";
	$token = hash('ripemd128',"salt1$password$salt2");
	$query = "SELECT id,username,about,reg_date FROM users WHERE username ='$username' AND pass ='$token'";
	$result = $connection->query($query) or die($connection->error);
	if(!$result)
	{
		echo "something went wrong";
	}
	else
	{
		session_start();
		
		
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if($row['username']=="")
		{
			session_destroy();
			echo "<!DOCTYPE html>\n<html><head><title>Confirmation</title>";
echo <<<_END
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/inkquiry.css">
</head>
_END;
     echo "<body>";
     echo '<div class="jumbotron center">';
     echo '<h3>Invalid username and/or password! <a href="main.php">Try Again...</a></h3>';
     echo '</div></body></html>';
			exit();
		}
		
		$_SESSION['signed_in'] = true;
		$result->close();
        $_SESSION['username']  = $row['username'];
		$_SESSION['about'] = $row['about'];
		$_SESSION['regdate'] = $row['reg_date'];//registration date
        $_SESSION['id'] = $row['id'];
		header("Location: $url");
		die();
		
	}

}

?>