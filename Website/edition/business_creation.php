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

if(isset($_POST['updateInfo']))
{
  require_once("../dbcontroller.php");
  $db_handle = new DBController();
  $query = "INSERT INTO job (company, industry, location, experience_level, job_function, job_title, employment_type, application_deadline, job_description, salary) VALUES
  ('" . $_POST["jobCompany"] . "', '" . $_POST["jobIndustry"] . "', '" . $_POST["companyLoc"] . "', '" . $_POST["experienceLevel"] . "', '" . $_POST["jobFunction"] . "', '" . $_POST["jobTitle"] . "', '" . $_POST["empType"] . "', '" . $_POST["appDeadline"] . "', '" . $_POST["jobDes"] . "', '" . $_POST["jobSalary"] . "')";

  $result = $db_handle->insertQuery($query);

  if(!empty($result))
  {
    header("Location: ../home/search_job.php");
  }
  else
  {
    header("Location: business_creation.php");
    echo "Insert falier";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create business</title>

    <!-- CSS -->

        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel='stylesheet' href="assets/css/material-kit.css">


  <!-- Javascript -->

 <script src="assets/js/jquery-1.12.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.backstretch.min.js"></script>
  <script src="assets/js/scripts.js"></script>
<!-- datepicker -->
  <script src="assets/js/material.min.js"></script>
  <script src="assets/js/material-kit.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>

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
          <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="Go to home" href="../home/home.php">Pseudo Linkedin</a>
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
            <li><a href="../home/search_job.php" data-toggle="tooltip" data-placement="bottom" title="Search for jobs">Search Jobs</a></li>
            <li><a href="../contact/contact_us.php" data-toggle="tooltip" data-placement="bottom" title="contact us">Contact us</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Notification"><i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>Notification</a></li>
            <li><a href="../logout.php" data-toggle="tooltip" data-placement="bottom" title="Sign out"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>Sign out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


        <div class="container">
             <div class="content">
                     <hr>
                      <h2>Create your jobs</h2>
                      <hr>
                      <form action="" method="post">
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Company Name</label>
                                  <input type="text" class="form-control" placeholder="" name="jobCompany" required>
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Industry </label>
                                  <input type="text" class="form-control"  name="jobIndustry" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label>Company Location </label>
                                <input type="text" class="form-control"  name="companyLoc" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                  <label>Job title</label>
                                  <input type="text" class="form-control" placeholder="" name="jobTitle" required>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>Job function</label>
                                  <input type="text" class="form-control" placeholder="" name="jobFunction" required>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Experience level</label>
                                  <input type="text" class="form-control" placeholder="" name="experienceLevel" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>Application Deadline </label>
                                <input type="text" class="datepicker form-control"  name="appDeadline" placeholder="month / day / year"required>
                            </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>Salary</label>
                                  <input type="number" class="form-control" placeholder="" name="jobSalary" required>
                              </div>
                          </div>

                          <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="employmentID">Employment type</lable>
                                       <select class="form-control" name="empType" id="employmentID">
                                        <option selected="true" style="display:none;"></option>
                                        <option>Internship </option>
                                        <option>Part-time </option>
                                        <option>Full-time </option>
                                       </select>
                                    </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Job Description</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="jobDes"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                         <button type="submit" name="updateInfo" class="btn btn-info btn-fill pull-right">Update Profile</button>
                      </div>
                    </form>

             </div>
        </div>



</body>
</html>
