<?php
session_start();
echo <<<_END
<div class = "navbar">
      <nav class="navbar navbar-default no-margin" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle Dropdown</span>
                  <span class="fa fa-bars"></span>
              </button>
              <a class="navbar-brand" href="index.php">Inkquiry</a>
            </div>
			<form action = "filtered_feed.php" class="navbar-form navbar-left" method="post" id="feedFilter">
		<fieldset>
						
					<div class="form-group">
							<div class="navbar-form navbar-left">
								<select required form="feedFilter" id="category" name="category" class="navbar-form-control navbar-left" style="width: 200px">
									<option value="Education">Education</option>
									<option value="Artistic">Artistic</option>
									<option value="Gaming">Gaming</option>
									<option value="Language">Language</option>
									<option value="Miscellaneous">Miscellaneous</option>
								</select>
							</div>
						<button id="submit" name="Submit" type="submit" value="Submit" class="btn btn-primary btn-md">Filter By Category</button>
					</div>
				
		</fieldset>					
		</form>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="main.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
_END;
if($_SESSION['signed_in']==true)
{
echo '<ul class="nav navbar-nav navbar-right"><li><a href="#">Signed in as: <b>' . $_SESSION['username'] . '</b></a></li></ul>';
}
else
{
echo <<<_END
<form action="login.php" method="post" class="navbar-form navbar-right" role="search">
  <div class="form-group">
    <input type="text" id="username" class="form-control" name="username" placeholder="Username" autofocus="autofocus" style="width: 95px">
  </div>
  <div class="form-group">
    <input type="password" id="password" class="form-control" name="password" placeholder="Password" style="width: 90px">
  </div>
  <input id="login" name="Submit" type="submit" value="Login">
</form>
_END;
}
echo <<<_END
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>
_END;
?>
      