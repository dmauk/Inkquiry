<?php
session_start();
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
		<?php include('includes/header.php'); ?>
         <!-- Navigation Bar end -->
		 
          <!-- Content -->
 <div class="container footerPad">
	<div class="row">
	         <!-- Sidebar -->
		<?php include('includes/menu.php'); ?>
			<!-- Sidebar end -->
			<!-- Contact Form -->
			<div class="col-md-6">
				<div class="well well-sm">
					<form class="form-horizontal" method="post">
						<fieldset>
							<legend class="text-center header">Contact us</legend>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-1">
									<input id="fname" name="name" type="text" placeholder="First Name" class="form-control" autofocus="autofocus">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-1">
									<input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-10 col-md-offset-1">
									<input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-10 col-md-offset-1">
									<textarea class="form-control" id="cmesg" name="message" placeholder="Enter text here." rows="7"></textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-primary btn-lg">Submit</button>
								</div>
							</div>
							
						</fieldset>
					</form>
				</div>
			</div>
			<!-- Contact form End -->			
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