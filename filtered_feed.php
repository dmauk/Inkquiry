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
		<?php include('includes/menu.php');?>
			<!-- Sidebar end -->
			<!-- Content Freed -->
      		<div class="col-md-10">
			
				<div class="well">
				<h2>Question Feed</h2>
					<table class="table">
						<thead>
							<tr>
								<th>User</th>
								<th>Question</th>
								<th>Contribute</th>
							</tr>
						<thead>
						<tbody>        
						<?php
							require_once 'connect.php';
							session_start();
							if(isset($_POST['category']))
							$category = mysql_real_escape_string($_POST['category']);
							$fail = validate_category($category);
							if($fail!="")
							{
								echo $fail;
								echo '<a href="textquestion.php">Try Again...</a>';
							}
							$query = "SELECT title, question,author,id, question_date, category 
							FROM questions 
							WHERE category = '$category'
							ORDER BY id DESC"; 
                        	$result = $connection->query($query) or die($connection->error);
                        	if($result==false)
                        	{
                        		echo '<tr class = "center"><td>No entries availalbe :(</td></tr>';
                        	}
                        	else
                        	{
                        		while($row = $result->fetch_array(MYSQLI_ASSOC))
                        		{
								$cat = $row['category'];
                        	    $question = $row['question'];
								$title = $row['title'];
                        	    $questionId = $row['id'];
                        	    $authorId = $row['author'];
								$datetime = $row['question_date'];
                        	    $acquireAuthor = $connection->query("SELECT username FROM users WHERE id = '$authorId'") or die($connection->error);
                       	 	    $authorArray = $acquireAuthor->fetch_array(MYSQLI_ASSOC);
                       		    $author = $authorArray['username'];
                          		echo '<tr>';
                          		echo '<td>'.$author.'</td>';
                          		echo '<td><p><b>'.$title."</b></p>\n"."<p>-Category: <i>".$cat."</i></p>\n"."<i>Posted</i>: ".'<i>'.$datetime.'</i>'.'</td>';
                     			echo '<td>
                     				 <div class="row">
                     				 <div class="col-xs-3">
                     				 <form action="answer_question.php" method="post">
                     				 <input name="question" id="question" type="hidden" value="'. $question .'">
                     				 <input name="qauthor" id="qauthor" type="hidden" value="'. $author .'">
                     				 <input name="id" id="id" type="hidden" value="'. $questionId .'">
                     				 <button id="Answer" name="Answer" type="submit" value="Answer" class="btn btn-primary btn-md">Answer</button></form>
                     				 </div>
                     				 <div class="col-xs-3">
                     				 <form action="view_question.php" method="post">
									 <input name="title" id="title" type="hidden" value="'. $title .'">
                     				 <input name="question" id="question" type="hidden" value="'. $question .'">
                     				 <input name="qauthor" id="qauthor" type="hidden" value="'. $author .'">
                     				 <input name="id" id="id" type="hidden" value="'. $questionId .'">
                     				 <button id="Answer" name="Answer" type="submit" value="Answer" class="btn btn-info btn-md">&nbspView&nbsp</button></form>
                     				 </div>';
                     			if($_SESSION['username']==$author)
                     			{
                     				echo '<div class="col-xs-3"> 
                     				 <form action="delete.php" method="post">
                     				 <input name="id" id="id" type="hidden" value="'. $questionId .'">
                     				 <button class="btn btn-warning">Delete</button></form>
                     				 </div>
                     				 </div>
                     				 </td>';
                     				 echo '</tr>';

                     			}
                     			else
                     			{
                     				echo '<div class="col-xs-3">';
                     				echo '</div>';
                     				echo '</div>';
                     				echo '</td>';
									echo '</tr>';
                     			}            				 
                     			
                    			}
                    		
                    		//$acquireAuthor->close();
                        	}
                        	$result->close();    
function validate_category($category)
{
   if($category!="")
      return "";  
   else
      return "No text entered!"; 
}							
                    	?>
                		</tbody>
            		</table>
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