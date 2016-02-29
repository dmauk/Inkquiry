<?php
require_once 'connect.php';
session_start();
if($_SESSION['username']!="")
{
    header('location: main.php');
    die();
}
echo <<<_END
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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
				<li><a href="main.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
              </ul>
_END;
echo <<<_END
                <form action="login.php" method="post" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" id="username" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <input id="login" name="Submit" type="submit" value="Login">
                </form>
_END;
echo <<<_END
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <div class="jumbotron center marginAddLarge">
            <h1>Inkquiry</h1>
            <p>A social site for all of your questions.</p>
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal">Register</button>
        </div>
        <div class="container marginAddSmall">
            <div class="row center">
                <div class="col-md-4 marginAddSmall">
                    <i class="fa fa-pencil-square-o fa-4x"></i>
                    <h3>Whiteboard</h3>
                    <p>Inkquiry incorporates a powerful feature known as the whiteboard. Users will be able to create white board sessions that give them the ability draw on their browser.</p>
                </div>
                <div class="col-md-4 marginAddSmall">
                    <i class="fa fa-comments fa-4x"></i>
                    <h3>Communication</h3>
                    <p>A variety of tools have been implemented to make sure Inkquiry's users have an easy time communicating with one another in a friendly manner.</p>
                </div>
                <div class="col-md-4 marginAddSmall">
                    <i class="fa fa-mobile fa-4x"></i>
                    <h3>Mobile Friendly</h3>
                    <p>Inkquiry is designed with mobile devices in mind. The features that you love will be available on your tablets, phones, etc through their built in web browsers.</p>
                </div>
            </div>
        </div>
        <div class="container footerPad">
            <div class="row">
                <div class="center marginAddSmall">
                    <h1>Why Choose Inkquiry?</h1>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Our Competitors</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Feature</th>
                                    <th>Available</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Whiteboard</td>
                                    <td><i class="fa fa-close checkPad"></i></td>
                                </tr>
                                <tr>
                                    <td>Optimized Communication</td>
                                    <td><i class="fa fa-close checkPad"></i></td>
                                </tr>
                                <tr>
                                    <td>Entertainment Focused Features</td>
                                    <td><i class="fa fa-close checkPad"></i></td>
                                </tr>
                                <tr>
                                    <td>Organizable Question Feed</td>
                                    <td><i class="fa fa-check checkPad"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Inkquiry</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Feature</th>
                                    <th>Available</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Whiteboard</td>
                                    <td><i class="fa fa-check checkPad"></i></td>
                                </tr>
                                <tr>
                                    <td>Optimized Communication</td>
                                    <td><i class="fa fa-check checkPad"></i></td>
                                </tr>
                                <tr>
                                    <td>Entertainment Focused Features</td>
                                    <td><i class="fa fa-check checkPad"></i></td>
                                </tr>
                                <tr>
                                    <td>Organizable Question Feed</td>
                                    <td><i class="fa fa-check checkPad"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                    </div>
                    <div class="modal-body">
                        <form class="row" action="signup.php" onsubmit="return validate(this)" method="post">
                            <div class="col-md-12">
                                <div class="form-group"><input type="email" id="email" class="form-control" name="email" placeholder="Email" title="Please use the current format email@emailProvider.com" required ></div>
                                <div class="form-group"><input type="text"  id="username" class="form-control" name="username" placeholder="Username" required></div>
                                <div class="form-group"><input type="password"  id="password" class="form-control" name="password" placeholder="Password requires 8 characters with a-z and 0-9" required></div>
                                <div class="form-group"><input type="password"  id="passwordRe" class="form-control" name="passwordRe" placeholder="Retype Password" required></div>
								<div class="form-group"><input type="text"  id="about" class="form-control" name="about" placeholder="Tell us about you"></div>								
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Submit</button>
						</form>
                    </div>
                </div>
            </div>
        </div>
            <!-- Footer begin -->               
            <div class = "navbard navbar-inverse navbar-fixed-bottom">
                  <div class="container">
                    <p class="navbar-text pull-left">A Community that's Here to Help: Project 4</p>
                    <a href="contactus.php" class="navbar-btn btn-default btn pull-right">Contact Us</a>
                </div> 
            </div>
			<!-- Footer end -->
        <script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/validate.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>
_END;
?>