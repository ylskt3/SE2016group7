<!DOCTYPE html>
<?php
 //start the session.
 session_start();

define('DB_HOST', 'us-cdbr-azure-central-a.cloudapp.net');
define('DB_NAME', 'se2016group7');
define('DB_USER', 'b84c6dec732d41');
define('DB_PASSWORD','cc33ed14');

if(isset($_POST['submit'])){
    $_SESSION['login'] = false;

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Connect Error ". mysqli_error($link));
    $sql = "SELECT password FROM user where username = ?";
    $_SESSION['user'] = $_POST['user'];
    if($stmt = mysqli_prepare($link, $sql)){
       mysqli_stmt_bind_param($stmt, "s", $_SESSION['user']);
       if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_bind_result($stmt, $password);
          if(mysqli_stmt_fetch($stmt)!= NULL){
              if($_POST['pass'] == $password){
                     $_SESSION['login'] = true;
                     header("Location: home/home.php");
              }

          }

       }
       mysqli_stmt_close($stmt);
    }
   mysqli_close($link);
}

?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pseudo Linkedin</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/animate.css">

        <!-- Javascript -->
        <script src="assets/js/jquery-1.12.3.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->

        <link rel="shortcut icon" href="assets/ico/linkedin.ico">
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text wow slideInLeft">
                            <h1><strong>Pseudo Linkedin</strong></h1>
                            <!-- You guys could add some descriptions here -->
                            <div class="description">
                            	<p>
	                            	Welcome to SE2016 GOURP 7!
                            	</p>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box wow slideInRight">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-sign-in"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                              <?php
                                     if( $_SESSION['login'] == false && isset($_POST['submit'])){
                                       echo "<div class='alert alert-danger'>";
                                       echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                       echo "<strong>Error!</strong> Invalid username or password.";
                                       echo "</div> ";

                                     }
                               ?>

                                <!-- here is the form for login submission. Grab input data from here-->
			                    <form role="form" action="index.php" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="user" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="pass" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" name = "submit" class="btn">Sign in</button>
			                    </form>

		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login wow flip">
                        	<h3>Don’t have an account? </h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2 launch-modal" href="#" data-modal-id="modal-register">
	                        		<i class="fa fa-registered"></i> Register
	                        	</a>

                        	</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- MODAL Pop up registration form-->
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">

        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h3 class="modal-title" id="modal-register-label">Sign up now</h3>
        				<p>Fill in the form below to register your account:</p>
        			</div>

        			<div class="modal-body">

        				<!-- here is the form for registration. Grab input data here -->
	                    <form role="form" action="register.php" method="post" class="registration-form">
                        <div class="row">
                          <div class="col-md-6">
	                    	    <div class="form-group">
	                    	    	<label class="sr-only" for="form-first-name">First name</label>
	                          	<input type="text" name="first_name" placeholder="First name" class="form-first-name form-control" id="form-first-name">
	                           </div>
                          </div>
                          <div class="col-md-6">
	                          <div class="form-group">
	                          	<label class="sr-only" for="form-last-name">Last name</label>
	                          	<input type="text" name="last_name" placeholder="Last name" class="form-last-name form-control" id="form-last-name">
	                          </div>
                          </div>
                      </div>
                        <div class="form-group">
	                        	<label class="sr-only" for="form-user-name">User name</label>
	                        	<input type="text" name="reg_user" placeholder="Username" class="form-user-name form-control" id="form-user-name">
	                      </div>
                        <div class="form-group">
			                        	<label class="sr-only" for="register-password">Password</label>
			                        	<input type="password" name="reg_pass" placeholder="Password" class="form-password form-control" id="register-password">
			                  </div>
                        <div class="form-group">
			                        	<label class="sr-only" for="confirm-password">ConfirmPassword</label>
			                        	<input type="password" name="confirm-password" placeholder="confirm your password" class="form-password form-control" id="confirm-password" onkeyup="checkPass(); return false;">
                                        <span id="confirmMessage" class="confirmMessage"></span>
			                  </div>
	                      <div class="form-group">
	                        	<label class="sr-only" for="form-email">Email</label>
	                        	<input type="text" name="email" placeholder="Email" class="form-email form-control" id="form-email">
	                      </div>

	                        <button type="submit" class="btn">Sign up</button>
	                    </form>


        			</div>

        		</div>
        	</div>
        </div>



    </body>

</html>
