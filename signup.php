<?php
  require_once 'connect.php';
//Gets user input if available
    $username = $email = $password = $passwordRe = "";
	if (isset($_POST['username']))
        $username = mysql_real_escape_string($_POST['username']);
	if (isset($_POST['email']))
        $email = mysql_real_escape_string($_POST['email']);
	if (isset($_POST['password']))
        $password = mysql_real_escape_string($_POST['password']);
    if (isset($_POST['passwordRe']))
        $passwordRe = mysql_real_escape_string($_POST['passwordRe']);
	if (isset($_POST['about']))
        $about = mysql_real_escape_string($_POST['about']);

//Concatenates failed string to display submission errors if any
    $fail  = validate_username($username);
    $fail .= validate_email($email);
    $fail .= validate_password($password);
    $fail .= validate_samePassword($password,$passwordRe);
    
    echo "<!DOCTYPE html>\n<html><head><title>Confirmation</title>";

    if ($fail == "")
    {
      $salt1="eqQ1$";
      $salt2="ss##s";
      $token = hash('ripemd128',"salt1$password$salt2");

      $query = "INSERT INTO users(username,pass,email,reg_date,about)
        VALUES('$username','$token','$email',NOW(),'$about')";
      $result = $connection->query($query);

      if(!$result) echo "INSERT failed: $query<br>" .
      $connection->error . "<br><br>";
    //If success -> show confirmation page
    //Also, do not mess with formatting of echo <<<_END and _END; 
    //White space with these commands will break the code so no indent
echo <<<_END
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/inkquiry.css">
</head>
_END;
	//send confirmation email
	$message = "Hello $username\r\n Welcome to Inkquiry. You have successfully registered. Login to begin asking or answering questions.\r\n";
	$message = wordwrap($message, 100, "\r\n");
	mail($email, 'Inkquiry', $message);
	//comfirmation email end

     echo "<body>";
     echo '<div class="jumbotron center">';
     echo '<h1>Account Created!<i class="fa fa-check checkPad"></i></h1>';
     echo '<h3>You will be known as:</h3>';
     echo '<h3>'.$username.'</h3>';
     echo '<h3>And we will email you at:</h3>';
     echo '<h3>'.$email.'</h3>';
     echo '<br><p><a class="btn btn-primary btn-lg" href="main.php" role="button">To Inkquiry!</a></p>';
     echo '</div></body></html>';
     exit;
    }



echo <<<_END
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/inkquiry.css">
</head>
<body>
    <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                    </div>
                    <div class="modal-body">
                        <form class="row" action="signup.php" method="post">
                            <div class="col-md-12">
                                <div class="form-group"><input type="email" id="email" class="form-control" name="email" placeholder="Email" title="Please use the current format email@emailProvider.com" required ></div>
                                <div class="form-group"><input type="text"  id="username" class="form-control" name="username" placeholder="Username" required></div>
                                <div class="form-group"><input type="password"  id="password" class="form-control" name="password" placeholder="Password requires 8 characters with a-z and 0-9" required></div>
                                <div class="form-group"><input type="password"  id="passwordRe" class="form-control" name="passwordRe" placeholder="Retype Password" required></div>
								<div class="form-group"><input type="text"  id="about" class="form-control" name="about" placeholder="Tell us about you"></div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="index.html" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
						</form>
                    </div>
                </div>
            </div>
_END;

echo '<div class="center error">';
echo $fail;
echo '</div>';
echo '</body>';
echo '</html>';

//All the awesome PHP validation
    function validate_samePassword($password,$passwordRe)
    {
        if($password == $passwordRe)
            return "";   
        else
            return "Passwords do not match!<br>";
    }
    
    function validate_email($field)
    {
        if ($field == "")
            return "No Email was entered<br>";
        else if (!((strpos($field, ".") > 0) &&
                     (strpos($field, "@") > 0)) ||
                      preg_match("/[^a-zA-Z0-9.@_-]/", $field))
            return "The Email address is invalid<br>";
        return "";
    }

    function validate_username($field)
    {
        if ($field == "") return "No Username was entered<br>";
        else if (strlen($field) < 5)
          return "Usernames must be at least 5 characters<br>";
        else if (strlen($field) > 18)
          return "Usernames must be less than 18 characters<br>";
        else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
          return "Only letters, numbers, - and _ in usernames<br>";
        return "";		
    }

     function validate_password($field)
    {
        if ($field == "") return "No Password was entered<br>";
        else if (strlen($field) < 8)
          return "Passwords must be at least 8 characters<br>";
        else if (!preg_match("/[a-z]/", $field) ||
                 !preg_match("/[0-9]/", $field))
          return "Passwords require 8 characters with a-z and 0-9<br>";
        return "";
    }

    function fix_string($string)
    {
        if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return htmlentities ($string);
    }
?>	