<?php
session_start();
$_SESSION['view_question_id'] = $_POST['id'];
if(!isset($_POST['qauthor']) && isset($_SESSION['username']))
{
	header("location: main.php");
	die();
}
$pagedata = pathinfo($_SERVER['REQUEST_URI']);
$_SESSION['last_page_visited'] = $pagedata['basename'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inkquiry</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/inkquiry.css">
    </head>
    <body>
		<!-- Navigation Bar Begin -->
		<?php include('includes/header.php');?>
         <!-- Navigation Bar end -->
		 
          <!-- Content -->
 <div class="container footerPad">
	<div class="row">
	          <!-- Sidebar -->
		<?php include('includes/menu.php'); ?>
			<!-- Sidebar end -->
			<!-- Question  -->
      		<div class="col-md-10">
				<div class="well">
						<form action = "answer.php" class="form-horizontal" method="post" id="questionForm">
						<fieldset>
							<?php
							echo '<legend class="text-center header"><b>'.$_POST['qauthor'].' asks: </b>'.$_POST['question'].'</legend>';
							

if(!$_SESSION['signed_in'])
{
echo <<<_END
  <div class="form-group">
    <div class="center col-md-10 col-md-offset-1">
      <h2>You must sign in to answer this question.</h2>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12 text-center">
        <span class="fa fa-ban fa-4x"></span>
    </div>
  </div>
_END;
}
else{
echo <<<_END
	<div class="form-group">
		<div class="col-md-10 col-md-offset-1">
			<textarea required form="questionForm" class="form-control" id="answer" name="answer" rows="7" placeholder="Enter text here." autofocus="autofocus"></textarea>
		</div>
	</div>
  <div class="form-group">
    <div class="col-md-12 text-center">
_END;
echo '<input name="id" id="id" type="hidden" value="'. $_POST['id'] .'">';
echo <<<_END
        <button id="submit" name="Submit" type="submit" value="Submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
  </div>
_END;
}
?>

						</fieldset>
					</form>
				</div>
      		</div>
			<!-- Question End -->			
  	</div>
</div>
			<!-- Footer begin -->               
		<?php include('includes/footer.php'); ?>
			<!-- Footer end -->
        <script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>