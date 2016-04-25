<?php
// Every time we want to access $_SESSION, we have to call session_start()
if(!session_start()) {
  header("Location: ../index.php");
  exit;
}

$loggedIn = empty($_SESSION['user']) ? false : $_SESSION['user'];
if (!$loggedIn) {
  header("Location: ../index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact us</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Javascript -->
        <script src="assets/js/jquery-1.12.3.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

       <!-- Favicon and touch icons -->

        <link rel="shortcut icon" href="assets/ico/linkedin.ico">

    </head>

    <body>
        <!-- menu bar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="Go to home" href="../home/home.php">Pseudo Linkedin</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="../edition/edit_your_profile.php">Edit Portfolio</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../edition/business_creation.php">Create business</a></li>
                          </ul>
                        </li>
                        <li><a href="../edition/connections.php" data-toggle="tooltip" data-placement="bottom" title="Connect your friends">Connection</a></li>
                        <li><a href="../home/search_job.php" data-toggle="tooltip" data-placement="bottom" title="Search for jobs">Search Jobs</a></li>
                        <li><a href="contact_us.php" data-toggle="tooltip" data-placement="bottom" title="contact us" >Contact us</a></li>

                      </ul>
                      <ul class="nav navbar-nav navbar-right">

                        <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Notification"><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>Notification</a></li>
                        <li><a href="../logout.php" data-toggle="tooltip" data-placement="bottom" title="Sign out"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>Sign out</a></li>
                      </ul>
                    </div><!--/.nav-collapse -->
              </div>
        </nav>


		<!-- Contact Form -->
		<div class="c-form-container section-container section-container-image-bg">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-8 col-sm-offset-2 c-form section-description wow bounceInLeft">
	                    <h1> <strong>Thank you for your suggestions!</strong> </h1>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-6 col-sm-offset-3 c-form-box wow bounceInRight">
	                    <div class="c-form-top">
                    		<div class="c-form-top-left">
                    			<h3>Contact us</h3>
								<p>Fill in the form below to contact us:</p>
                    		</div>
                    		<div class="c-form-top-right">
                    			<div class="c-form-top-right-icon">
                    				<i class="fa fa-paper-plane"></i>
                    			</div>
                    		</div>
                        </div>
                        <div class="c-form-bottom">
                            <!-- Grab data here -->
		                    <form role="form" action="assets/contact.php" method="post">
		                    	<div class="form-group">
		                    		<label for="c-form-name">
		                    			<span class="label-text">Name:</span>
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="name" placeholder="Your name" class="c-form-name form-control" id="c-form-name">
		                        </div>
		                    	<div class="form-group">
		                    		<label for="c-form-email">
		                    			<span class="label-text">Email:</span>
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="email" placeholder="Your email address" class="c-form-email form-control" id="c-form-email">
		                        </div>
		                        <div class="form-group">
		                        	<label for="c-form-subject">
		                    			<span class="label-text">Subject:</span>
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="subject" placeholder="Message subject" class="c-form-subject form-control" id="c-form-subject">
		                        </div>
		                        <div class="form-group">
		                        	<label for="c-form-message">
		                    			<span class="label-text">Message:</span>
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<textarea name="message" placeholder="Message text" class="c-form-message form-control" id="c-form-message"></textarea>
		                        </div>
		                        <button type="submit"  class="btn">Send message</button>
		                    </form>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-12 c-form-info-title wow rollIn">
	            		<h3> find us here:</h3>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-3 c-form-info-box wow swing">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-map-marker"></i>
	            		</div>
	            		<p><a target="_blank" data-toggle="tooltip" data-placement="bottom" title="Location" href="https://www.google.com/maps/place/International+Center/@38.9452612,-92.3272482,17z/data=!3m1!4b1!4m2!3m1!1s0x87dcb7c0f3b0d989:0x6aefe313464fa6a7">International Center<br>Columbia, MO, 65201</a></p>
	            	</div>
	            	<div class="col-sm-3 c-form-info-box wow swing">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-phone"></i>
	            		</div>
	            		<p>Phone:<br>573-xxx-xxxx</p>
	            	</div>
	            	<div class="col-sm-3 c-form-info-box wow swing">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-envelope"></i>
	            		</div>
	            		<p>Email:<br><a href="mailto:zzyrd@mail.missouri.edu" data-toggle="tooltip" data-placement="bottom" title="Send email">zzyrd@mail.missouri.edu</a></p>
	            	</div>

	            	<div class="col-sm-3 c-form-info-box wow swing">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-weixin" aria-hidden="true"></i>
	            		</div>
	            		<p>Wechat:<br><a id="wechat" data-toggle="tooltip" data-placement="bottom" title="See QRcode">zzh940603</a></p>
                  <img id="QRcode" src="assets/img/wcQRcode.png" alt="Wechat QR code" height="300" width="300">
	            	</div>
	            </div>
	        </div>
        </div>






    </body>

</html>
