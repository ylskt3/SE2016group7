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
  //connect to database
define('DB_HOST', 'us-cdbr-azure-central-a.cloudapp.net');
define('DB_NAME', 'se2016group7');
define('DB_USER', 'b84c6dec732d41');
define('DB_PASSWORD','cc33ed14');
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$target_user = $_SESSION['user'];

if(isset($_POST['searchBtn']))
{
  $search_param = $_POST['search_param'];
  $user_input = $_POST['user_input'];

  $query = "SELECT * FROM job WHERE $search_param LIKE '$user_input'";

  $result = mysql_query($query);
  if (!$result)
  {
    if($user_input == ""){
        $query = "SELECT * FROM job";
        $result = mysql_query($query);
        if (!$result) die ("Database access failed: " . mysql_error());
     }
     else {

     }

  }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Search page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>

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
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/wow.min.js"></script>
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
                <li><a href="edit_your_profile.php">Edit Portfolio</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="business_creation.php">Create business</a></li>
              </ul>
            </li>
            <li><a href="connections.php" data-toggle="tooltip" data-placement="bottom" title="Connect your friends">Connection</a></li>
            <li><a href="searh_job.php" data-toggle="tooltip" data-placement="bottom" title="Search for jobs">Search Jobs</a></li>
            <li><a href="../contact/contact_us.php" data-toggle="tooltip" data-placement="bottom" title="contact us">Contact us</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Notification"><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>Notification</a></li>
            <li><a href="../logout.php" data-toggle="tooltip" data-placement="bottom" title="Sign out"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>Sign out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- search bar -->
           <hr>
            <div class="container">
            <div class="row">
                <div class="col-xs-9 col-xs-offset-1">
                 <form method="post" action="searh_job.php">
                    <div class="input-group">
                        <div class="input-group-btn search-panel wow bounceInLeft">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">Filter By</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#company">Company</a></li>
                              <li><a href="#job_title">Job title</a></li>

                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control wow zoomIn" name="user_input" placeholder="Search your jobs">
                        <span class="input-group-btn wow bounceInRight">
                            <button class="btn btn-default" name="searchBtn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
                <hr>
            </div>

            <div class="container">
               <h1 class="wow rotateIn">Search results</h1>
               <table class="table table-hover">
                    <thead class="wow fadeInDown">
                          <tr>
                            <th>Company</th>
                            <th>Job title</th>
                            <th>description</th>
                            <th>Salary</th>
                            <th></th>
                          </tr>
                    </thead>
                    <tbody>
                      <?php

                              $tbClass = array("success wow bounceIn", "danger wow bounceIn", "info wow bounceIn");
                              $i = 0;
                             while($row = mysql_fetch_array($result)){
                                   echo "<tr class='$tbClass[$i]'>";
                                   echo "<td>" . $row['company'] . "</td>";
                                   echo "<td>" . $row['job_title'] . "</td>";
                                   echo "<td>" . $row['job_description'] . "</td>";
                                   echo "<td>" . "$".$row['salary'] . "</td>";
                                   echo "<td><input class='btn btn-default' type='submit' name='view' value='View'></td>";
                                   echo "</tr>";
                                   $i++;

                                   if($i == 3)
                                    $i = 0;
                             }


                      ?>
                    <!--
                          <tr class="success ">
                            <td>Apple</td>
                            <td>Graphic design</td>
                            <td>something typing codes</td>
                            <td>$150,000 per year</td>
                          </tr>
                          <tr class="danger ">
                            <td>Blizzard</td>
                            <td>Game tester</td>
                            <td>Only one requirement: you must have played Blizzard's games.</td>
                            <td>$100,000 per year</td>
                          </tr>
                          <tr class="info ">
                            <td>Google</td>
                            <td>Google translator</td>
                            <td>at least knowing two languages</td>
                            <td>$120,000 per year</td>
                          </tr>
                       -->
                    </tbody>
                 </table>
              </div>


</body>

</html>
