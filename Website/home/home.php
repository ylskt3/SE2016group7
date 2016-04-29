<!DOCTYPE html>
<?php
    	// Every time we want to access $_SESSION, we have to call session_start()a
    	if(!session_start()) {
    		header("Location: ../index.php");
    		exit;
    	}

    	$loggedIn = empty($_SESSION['user']) ? false : $_SESSION['user'];
    	if (!$loggedIn) {
    		header("Location: ../index.php");
    		exit;
    	}

      //connect to database
      /*define('DB_HOST', 'us-cdbr-azure-central-a.cloudapp.net');
      define('DB_NAME', 'se2016group7');
      define('DB_USER', 'b84c6dec732d41');
      define('DB_PASSWORD','cc33ed14');
      $con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
      $db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());*/

      require_once("../dbcontroller.php");
      $db_handle = new DBController();

      $target_user = $_SESSION['user'];

      $query = "SELECT * FROM user WHERE username = '$target_user'";
      $result = $db_handle->selectQuery($query);

      if (!$result) die ("Database access failed: " . mysql_error());

      $row = mysql_fetch_array($result);

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <!-- CSS -->

            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.min.css">
            <link rel="stylesheet" href="assets/css/animate.css">


      <!-- Javascript -->

      <script src="assets/js/jquery-1.12.3.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.backstretch.min.js"></script>
      <script src="assets/semantic/semantic.min.js"></script>
      <script src="assets/js/wow.min.js"></script>
      <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    <!-- Favicon and touch icons -->

    <link rel="shortcut icon" href="assets/ico/linkedin.ico">


</head>
<body id="bodyID">

    <!-- Top menu -->

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="Go to home" href="home.php">Pseudo Linkedin</a>
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
            <li><a href="search_job.php" data-toggle="tooltip" data-placement="bottom" title="Search for jobs">Search Jobs</a></li>
            <li><a href="../contact/contact_us.php" data-toggle="tooltip" data-placement="bottom" title="contact us">Contact us</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Notification"><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>Notification</a></li>
            <li><a href="../logout.php" data-toggle="tooltip" data-placement="bottom" title="Sign out"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>Sign out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <!-- Profile -->
    <div class="form-container">
         <div  class="container jumbotron wow bounceIn">

           <div class="wow zoomInDown">
            <h1>Welcome!  <?php echo $row['last_name'] . ", " . $row['first_name']?></h1>
            <p>This is your homepage!</p>
          </div>

        </div> <!-- /container 1 -->

        <div  class="container jumbotron wow bounceIn">

            <div class="wow flip">
            <img  class="img-circle" width="304" height="236" src="assets/img/9.jpg">
            </div>

            <div class="ui stackable celled grid container">
                <div class="two column row">
                   <div class="column wow rotateInDownLeft">
                       <div class="ui segment"><?php echo $row['last_name'] . ", " . $row['first_name']?> </div>
                   </div>
                   <div class="column wow rotateInDownRight">
                     <div class="ui segment">Interest: <?php echo $row['area_of_interest']?></div>
                    </div>
                </div>
                <div class="three column row">
                    <div class="column wow fadeInLeftBig">
                            <div class="ui segment">Phone: <?php echo $row['phone']?></div>
                   </div>
                   <div class="column wow rotateIn">
                       <div class="ui segment"><?php echo $row['email']?></div>
                   </div>
                   <div class="column wow fadeInRightBig">
                       <div class="ui segment">University: <?php echo ""?></div>
                   </div>
                </div>
                <div class="two column row">
                    <div class="column wow rotateInUpLeft">
                            <div class="ui segment">Address 1: <?php echo $row['address']?></div>
                    </div>
                     <div class="column wow rotateInUpRight">
                            <div class="ui segment">City: <?php echo $row['city']?></div>
                    </div>
                </div>
           </div>

       </div> <!-- /container 2-->


       <div class="container jumbotron  wow bounceIn">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Education
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Experience
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Volunteer
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>
      </div> <!-- /container 3-->

    </div>




</body>
</html>
