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
		<?php include('includes/menu.php');?>
			<!-- Sidebar end -->
			<!-- Content Freed -->
      	<div class="col-md-10">
			  <div class="well">
          <div class="header">
              <div class="row">
                <div class="center col-md-3">
                  <img id="profile" src="images/userblank.png"alt="placeholder">
                  <?php echo '<h4><b>'.$_POST['qauthor'].'</b></h4>' ?>
                </div>
                <div class="center col-md-9">
                  <?php 
					echo '<br><br><p><h1><b>'.$_POST['title'].'</b></h1></p>';
                    echo '<br><br><p><h2 style="word-wrap:break-word;color:#428bca">"'.$_POST['question'].'"</h2></p>';
                    echo '<form action="answer_question.php" method="post">
                          <input name="question" id="question" type="hidden" value="'. $_POST['question'] .'">
                          <input name="qauthor" id="qauthor" type="hidden" value="'. $_POST['qauthor'] .'">
                          <input name="id" id="id" type="hidden" value="'. $_POST['id'] .'">
                          <button id="Answer" name="Answer" type="submit" value="Answer" class="btn btn-primary btn-md">Answer</button></form>';

                  ?>
                </div>
              </div>
          </div>
        </div>
				<div class="well">
					<h2>Answers</h2>
					<table class="table">
						<thead>
							<tr>
								<th>User</th>
								<th>Answer</th>
							</tr>
						<thead>
						<tbody>        
						<?php
							require_once 'connect.php';
              $questionId = mysql_real_escape_string($_POST['id']);
							$query = "SELECT content,author,id, answer_date FROM answers WHERE question_id ='$questionId' ORDER BY id ASC";
                        	$result = $connection->query($query) or die($connection->error);
                        	while($row = $result->fetch_array(MYSQLI_ASSOC))
                        	{
                              $authorId = $row['author'];
                              $acquireAuthor = $connection->query("SELECT username FROM users WHERE id = '$authorId'") or die($connection->error);
                              $authorArray = $acquireAuthor->fetch_array(MYSQLI_ASSOC);
                              $author = $authorArray['username'];
                        	  $answer = $row['content'];
							  $datetime = $row['answer_date'];
                              $answerId = $row['id'];
								echo '<tr>';
                          		echo '<td>'.$author.'</td>';
                          		echo '<td><p>'.$answer."</p>\n"."<i>Posted</i>: ".'<i>'.$datetime.'</i>'.'</td>';;
                              if($_SESSION['username']==$author)
                              {
                                 echo '<td><div class="col-xs-3">
                                <form action="delete_answer.php" method="post">
                                <input name="id" id="id" type="hidden" value="'. $answerId .'">
                                <button class="btn btn-warning">Delete</button></form>
                                </div>
                                </div>
                                </td>';
                                echo '</tr>';
                              }
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