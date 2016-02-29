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
			<!-- Content Freed -->
      		<div class="col-md-10">
			
				<div class="well">
					<h2>About Us</h2>          
					<hr class="col-md-12">
					<!-- About us Description -->
					<p>
					About Our Website: The goal of "Inkquiry" is to establish a website that provides users with an easy and entertaining way to ask and answer the questions of fellow users. 
					Our website not only caters to educators and students, but gamers, and a variety of other people. 
					We cater to almost everyone that may have a question to ask. Inkquiry is primarily a knowledge market type website similar to Just Answer or Yahoo Answers. 
					Users will have the ability to post and answer questions on our stylishly clean website. 
					If the user is unsatisfied with their question, they have the option to delete it instantly through the question feed. 
					The process of finding questions to answer is simplified by the questions feed which orders the questions by date or category.
					Through this simple system, the website facilitates learning in several fields through a simple questions system.</p> 
					<!-- About us Description End -->   					
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