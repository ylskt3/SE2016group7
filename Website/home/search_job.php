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
include("../kdnuggets-php-mysql/fusioncharts/fusioncharts.php");
require_once("../dbcontroller.php");
$db_handle = new DBController();

$dbhandle = new mysqli($host, $user, $password, $database);
if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
}

/*define('DB_HOST', 'us-cdbr-azure-central-a.cloudapp.net');
define('DB_NAME', 'se2016group7');
define('DB_USER', 'b84c6dec732d41');
define('DB_PASSWORD','cc33ed14');
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());*/

$target_user = $_SESSION['user'];

if(isset($_POST['searchBtn']))
{
  if(empty($_POST['search_param']))
  {
    $user_input = $_POST['user_input'];

    $query = "SELECT * FROM job WHERE company LIKE '%$user_input%' OR job_title LIKE '%$user_input%' OR job_description LIKE '%$user_input%'";
  }
  else
  {
    $search_param = $_POST['search_param'];
    $user_input = $_POST['user_input'];

    $query = "SELECT * FROM job WHERE $search_param LIKE '%$user_input%'";
  }

  $result = $db_handle->selectQuery($query);

  if (!$result)
  {
    echo "NOT RESULTS FOUND";
  }
}

if(isset($_POST['showAlljobs']))
{
  $query = "SELECT * FROM job";

  $result = $db_handle->selectQuery($query);

  if (!$result)
  {
    echo "NOT RESULTS FOUND";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <script src="../kdnuggets-php-mysql/fusioncharts/js/fusioncharts.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">


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

    <style>
       .viewButton {
         color: #333;
         background-color: #fcf8e3;
         border-color: #f0ad4e;
       }
       .viewButton:hover {
         color: #f5f5f5;
         background-color: #9999ff;
         border-color: #333;
       }

      .modal_size_modify {
        height: 400px;
      }
       .btn_apply {
         color: #fff;
         background-color: #5bc0de;
         border-color: #46b8da;
       }
       .btn_apply:hover {
         color: #5bc0de;
         background-color: #fff;
         border-color: #8EBB1A;
       }
    </style>
    <script >
    $(document).on('submit', '#info_form', function()
{
 $.post('info_view.php', $(this).serialize(), function(data)
 {
  $("#msg").html(data);
 });

 return false;

});

   </script>
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

    <!-- For showing information when user click apply button in the modal -->
     <?php
            if(isset($_POST['apply'])){

              echo "<div class='alert alert-success'>";
              echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
              echo "<strong>You've submitted your application successfully!</strong>";
              echo "</div> ";

         }


      ?>

    <!-- search bar -->
           <hr>
            <div class="container">
            <div class="row">
                <div class="col-xs-9 col-xs-offset-1">
                 <form method="post" action="search_job.php">
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
                        <input type="hidden" name="search_param" value="" id="search_param">
                        <input type="text" class="form-control wow zoomIn" name="user_input" placeholder="Search your jobs">
                        <span class="input-group-btn wow bounceInRight">
                            <button class="btn btn-default" name="searchBtn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>

                        <span class="input-group-btn wow bounceInRight">
                            <button class="btn btn-default" name="showAlljobs" type="submit">Show all</button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
                <hr>
            </div>
          <br>
           <br>
            <?php


  $strQuery = "SELECT salary, company FROM job;";

  $result1 = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
  if ($result1) {

  $arrData = array(
      "chart" => array(
          "caption"=> "All jobs' payment",
          "subCaption"=> "",
          "captionFontColor"=> "#000000",
          "captionFontBold"=> "1",
          "captionFontSize"=> "27",

          // x and y axes configuration options
          "xAxisName"=> "Companies",
          "xAxisNameFontSize"=> "18",
          "xAxisNameFontBold"=> "0",
          "yAxisName"=> "Salary (in USD)",
          "yAxisNameFontSize"=> "18",
          "yAxisNameFontBold"=> "0",

          // general chart configuration options
          "baseFont"=> "Open Sans",
          "paletteColors"=> "#06A69E",
          "plotFillAlpha"=> "90",
          "usePlotGradientColor"=> "0",
          "numberPrefix"=> "$",
          "bgcolor"=> "#ffffff",
          "bgalpha"=> "95",
          "canvasbgalpha"=> "0",
          "basefontcolor"=> "#000000",
          "showAlternateHGridColor"=> "0",
          "divlinealpha"=> "50",
          "divlinedashed"=> "0",
          "rotateyaxisname"=> "1",
          "canvasbordercolor"=> "#ffffff",
          "canvasborderthickness"=> ".3",
          "canvasborderalpha"=> "100",
          "showValues"=> "0",
          "plotSpacePercent"=> "8",
          "labelFontSize"=> "0",
          "outCnvBaseFontSize"=> "13",
          "showLimits"=> "0",

          // tooltip configuration options
          "toolTipBgColor"=> "#f5f5f5",
          "toolTipPadding"=> "12",
          "toolTipBorderRadius"=> "3",
          "toolTipBorderThickness"=> "1",
          "toolTipBorderColor"=> "#ccc",
          "toolTipBgAlpha"=> "70"
          )
      );

          $arrData["data"] = array();


          while($row1 = mysqli_fetch_array($result1)) {
          array_push($arrData["data"], array(
          "label" => $row1["company"],
          "value" => $row1["salary"]
          )
        );
          }

            $jsonEncodedData = json_encode($arrData);

              $columnChart = new FusionCharts("column2d", "expenseChart" , "100%", "500", "column-chart", "json", $jsonEncodedData);
             $columnChart->render();

             $dbhandle->close();

         }

?>
            <center><div id="column-chart"></div></center>
            <br>
           <br><br>
           <br>


            <div class="container">
               <h1 class="wow rotateIn">Search results</h1><br>
           <br>
               <table class="table table-hover">
                    <thead class="wow fadeInDown">
                          <tr>
                            <th>Company</th>
                            <th>Job title</th>
                            <th>description</th>
                            <th>Application deadline</th>
                            <th></th>
                          </tr>
                    </thead>
                    <tbody>
                      <?php

                              $tbClass = array("success wow bounceIn", "danger wow bounceIn", "info wow bounceIn");
                              $i = 0;
                            /*
                             while($row = mysql_fetch_array($result)){
                                   echo "<tr class='$tbClass[$i]'>";
                                   echo "<td>" . $row['company'] . "</td>";
                                   echo "<td>" . $row['job_title'] . "</td>";
                                   echo "<td>" . $row['job_description'] . "</td>";
                                   echo "<td>" . $row['application_deadline'] . "</td>";
                                   echo "<td><button type='button' name='view' class='btn viewButton' data-toggle='modal' data-target='#my_modal'>View</button></td>";
                                   echo "</tr>";
                                   $i++;

                                   if($i == 3)
                                    $i = 0;
                             }
                           */

                              while($row = mysql_fetch_array($result)){

                                echo "<form method='post' id='info_form'>";

                                   echo "<tr class='$tbClass[$i]'>";
                                   echo "<td><input type='hidden'  name='company' value='".$row['company']."'> ". $row['company'] ." </td>";
                                   echo "<td><input type='hidden' name='job_title' value='".$row['job_title']."'> ". $row['job_title'] ." </td>";
                                   echo "<td><input type='hidden' name='description' value='".$row['job_description']."'> ". $row['job_description'] ." </td>";
                                   echo "<td><input type='hidden' name='deadline' value='".$row['application_deadline']."'> ". $row['application_deadline'] ." </td>";
                                   echo "<td><button type='submit' class='btn viewButton' data-toggle='modal' data-target='#my_modal' >View</button></td>";
                                   echo "</tr>";

                                /* when click view button in each row of the table, you can the following info */
                                    echo "<input type='hidden' name='location' value='".$row['location']."'> ";
                                    echo "<input type='hidden' name='industry' value='".$row['industry']."'> ";
                                    echo "<input type='hidden' name='experience_level' value='".$row['experience_level']."'> ";


                               echo "</form>";

                                   $i++;

                                   if($i == 3)
                                    $i = 0;
                             }



                      ?>

                    </tbody>
                 </table>
              </div>

              <!-- Modal for view button -->
             <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content modal_size_modify">
                   <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

                        <h3 class="modal-title" id="modal-register-label">More Job information</h3>
                    </div>

                   <div class="jumbotron">
                       <p id="msg"></p>
                 </div>
                 <hr>
                 <div>
                   <form action="search_job.php" method="post">
                 <button type="submit" name="apply" class="btn btn_apply pull-right">Apply</button>
                   </form>

               </div>
             </div>
           </div>
         </div>







</body>

</html>
