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
        <link rel="stylesheet" href="css/whiteboard.css">
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
			<!-- Question  -->
      	<div class="col-md-10">
			<div class="well">
						<fieldset>
							<legend class="text-center header">Draw</legend>
					<div class="col-md-12">
                                    <!--WhiteBoard Start-->
                                    <div id="toolbar" class="navbar">
                                        <div class="navbar-header">
                                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toolbarCollapse">
                                              <span class="sr-only">Toggle Dropdown</span>
                                              <span class="fa fa-bars"></span>
                                          </button>
                                          <div class="navbar-brand">Toolbar</div>
                                        </div>
                                        <div class="collapse navbar-collapse" id="toolbarCollapse">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li><a id="x"></a></li>
                                                <li><a id="y"></a></li>
                                                <li><a id="clear">Clear</a></li>
                                                <li><a id="save">Save</a></li>
                                            </ul>
                                            <ul id = "colors" class="nav navbar-form navbar-right">
                                            </ul>
                                        </div> 
                                    </div>
                                    <hr>
                                    <div class="center">
                                        <p>
                                            <canvas id="whiteboard" class="well" height=400 width=600>
                                                Your browser does not support whiteboard. 
                                            </canvas>
                                        </p>
                                    </div>
                                    <!--WhiteBoard End-->
					</div>
						</fieldset>
      		</div>
			<!-- Question End -->			
		</div>
	</div>
</div>
			<!-- Footer begin -->               
		<?php include('includes/footer.php'); ?>
			<!-- Footer end -->
        <script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/radius.js"></script>
        <script src="js/colors.js"></script>
        <script src="js/save.js"></script>
        <script src="js/clear.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>