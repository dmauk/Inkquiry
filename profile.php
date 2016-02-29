<?php
session_start();
$pagedata = pathinfo($_SERVER['REQUEST_URI']);
$_SESSION['last_page_visited'] = $pagedata['basename'];
$username = $_SESSION['username'];
$about = $_SESSION['about'];
$regdate = 	$_SESSION['regdate'];
$profileim = "images/userblank.png";
if(!$_SESSION['signed_in'])
{
	$username = "You must sign in to view your profile.";
	$profileim = "images/nouser.png";
}
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
			<!-- Content Freed -->

      		<div class="col-md-10">
				<div class="well">
				    <div class="row">
                        <div class="col-md-12 center">
                            <?php echo '<img id="profile" src="'.$profileim.'"alt="placeholder">'; ?>
                            <h3><b><?php echo "$username";?></b></h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="center">
                                <b>User Statistics</b>
                            </div>
                                <div class="panel panel-default">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Registration Date:</td>
                                                <td><?php echo "$regdate";?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="center">
                                <b>About</b>
                            </div>
                            <p id="userAbout"><?php echo "$about";?></p>
                        </div>
                    </div>
				</div>
      		</div>
			<!-- Content Feed End -->			
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