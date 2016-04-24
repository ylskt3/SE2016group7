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

  $title = $_POST['title'];
  $interest = $_POST['interest'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['states'];
  $user = $_SESSION['user'];
  //$country= $_POST['country'];
  //$zipcode = $_POST['zipcode'];

  $query = "UPDATE user 
  SET title = '$title', area_of_interest = '$interest', email = '$email', phone = '$phone', address = '$address', city = '$city', state = '$state' 
  WHERE username = '$user'";

  $result = $db_handle->updateQuery($query);

  if(!empty($result))
  {
    header("Location: home.php");
    unset($_POST);
  }
  else
  {
    echo "ERROR";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Build your business</title>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit information</title>

    <!-- CSS -->

        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.min.css">

    <!--    <link rel="stylesheet" type="text/css" href="assets/css/datepicker.css">  -->


  <!-- Javascript -->


  <script src="assets/js/jquery-1.12.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.backstretch.min.js"></script>
  <script src="assets/semantic/semantic.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <!--
  <script src="assets/js/bootstrap-datepicker.js"></script>
-->
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

    <hr>
    <div class="container">
         <div class="content">
                  <form action="edit_your_profile.php" method="post">
                      <h2>Basic information</h2>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" class="form-control"  name="fname" value="Mike" disabled>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control"  name="lname" value="Andrew" disabled>
                              </div>
                          </div>
                          <!-- put a select choice here -->
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>Gender</label>
                                  <input type="text" class="form-control"  name="gender" disabled>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" class="form-control"  name="title" required>
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Interests</label>
                                  <input type="text" class="form-control"  name="interest" required>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control"  name="email" required>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Country#</label>
                                <input type="text" class="form-control" name="phone" placeholder="+1" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" required>
                            </div>
                        </div>

                      </div>


                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" class="form-control" placeholder="Home Address" name="address" required>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>City</label>
                                  <input type="text" class="form-control"  name="city" required>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>State/Province</label>
                                  <input type="text" class="form-control"  name="states" required>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Country</label>
                                  <input type="text" class="form-control"  name="country" required>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Postal Code</label>
                                  <input type="number" class="form-control"  name="zipcode" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                         <button type="submit" name="updateInfo" class="btn btn-info btn-fill pull-right">Update Profile</button>
                      </div>
                    </form>

                      <br>
                      <hr>
                      <h2>Education</h2>
                      <form action="edit_your_profile.php" method="post">
                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>School</label>
                                  <input type="text" class="form-control" placeholder="" name="school" required>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Major </label>
                                  <input type="text" class="form-control"  name="major" required>
                              </div>
                          </div>
                          <div class="col-md-1">
                              <div class="form-group">
                                  <label>GPA </label>
                                  <input type="text" class="form-control"  name="gpa" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <!-- put datepicker here -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Attended since </label>
                                <input type="text" class="form-control"  name="attendTime" placeholder="day / month / year"required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Graduation date </label>
                                <input type="text" class="form-control"  name="gradDate" placeholder="day / month / year" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Degree </label>
                                <input type="text" class="form-control"  name="degree" placeholder="bachelor?" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>University Location </label>
                                <input type="text" class="form-control"  name="universityLoc" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Education Description</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="educationDes"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                         <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                      </div>
                    </form>

                      <br>
                      <hr>
                      <h2>Experience</h2>
                      <form action="edit_your_profile.php" method="post">
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" class="form-control" placeholder="" name="company" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>title </label>
                                <input type="text" class="form-control"  name="title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time_period </label>
                                <input type="text" class="form-control"  name="time_period" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Company location </label>
                                <input type="text" class="form-control"  name="companyLoc" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Working Description</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="workingDes"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                         <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                      </div>
                    </form>

                      <br>
                      <hr>
                      <h2>Volunteer</h2>
                      <form action="edit_your_profile.php" method="post">
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Organization</label>
                                <input type="text" class="form-control" placeholder="" name="organization" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Role </label>
                                <input type="text" class="form-control"  name="role" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dates </label>
                                <input type="text" class="form-control"  name="volunteerDate" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Motivations to volunteer</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="motivations"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Volunteer Description</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="volunteerDes"></textarea>
                              </div>
                          </div>
                      </div>
                     <div class="row">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                     </div>
                   </form>
                    <hr>
            </div>
    </div>





</body>
</html>
