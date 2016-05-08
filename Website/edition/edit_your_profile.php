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

require_once("../dbcontroller.php");
$db_handle = new DBController();


$user = $_SESSION['user'];

$query2 = "SELECT * FROM user WHERE username = '$user'";
$result2 = $db_handle->selectQuery($query2);

//echo $query2;

if (!$result2) die ("Database access failed: " . mysql_error());

$row = mysql_fetch_array($result2);

$userId = $row['user_id'];

if(isset($_POST['updateInfo']))
{
  $query = "UPDATE user SET";
  $comma = " ";
  $whitelist = array(
      'picture blob',
      'title',
      'area_of_interest',
      'email',
      'phone',
      'address',
      'company',
      'city',
      'state'
      // ...etc
  );

  foreach($_POST as $key => $val) {
    if(!empty($val) && in_array($key, $whitelist)) {
        $query .= $comma . $key . " = '" . mysql_real_escape_string(trim($val)) . "'";
        $comma = ", ";
    }
    else
    {
       header("Location: ../home/home.php");
       unset($_POST);
    }
  }

  $query .= " WHERE username = '$user'";

  //echo $query;
  //$sql = mysql_query($query);

  /*$query = "UPDATE user
  SET title = '$title', area_of_interest = '$interest', email = '$email', phone = '$phone', address = '$address', city = '$city', state = '$state'
  WHERE username = '$user'";*/

  $result = $db_handle->updateQuery($query);

  if(!empty($result))
  {
    header("Location: ../home/home.php");
    unset($_POST);
  }
  else
  {
    echo "ERROR";
  }

}

if(isset($_POST['updateEdu']))
{

  $result3 = mysql_query("SELECT * FROM education WHERE user_id = $userId");

  //echo mysql_num_rows($result3);

  //$result3 = $db_handle->selectQuery($query3);
  /*
   user_id int references user(user_id),
    school varchar(50) not null,
    location varchar(100) not null,
    gpa varchar(10),
    dates_attended varchar(50),
    field_of_study varchar(50),
    degree varchar (50),
    activities_and_societies varchar(500),
    description varchar(500),
  */

  if(mysql_num_rows($result3) > 0) 
  {
      //echo "it is not empty";
      $comma1 = " ";
      $whitelist1 = array(
      'user_id',
      'school',
      'edu_location',
      'gpa',
      'major',
      'dates_attended',
      'dates_graduated',
      'field_of_study',
      'degree',
      'activities_and_societies',
      'edu_description'
      // ...etc
      );
      $query3 = "UPDATE education SET";

      foreach($_POST as $key1 => $val1) 
      {
        if( ! empty($val1) && in_array($key1, $whitelist1)) 
        {
            $query3 .= $comma1 . $key1 . " = '" . mysql_real_escape_string(trim($val1)) . "'";
            $comma1 = ", ";
        }
        else
        {
          header("Location: ../home/home.php");
          unset($_POST);
        }

      }
      $query3 .= " WHERE user_id = '$userId'";
  }
  else
  {
      //echo "it is empty";
      $school = $_POST['school'];
      $gpa = $_POST['gpa'];
      $major = $_POST['major'];
      $dates_attended = $_POST['dates_attended'];
      $dates_graduated = $_POST['dates_graduated'];
      $degree = $_POST['degree'];
      $edu_location = $_POST['edu_location'];
      $edu_description = $_POST['edu_description'];

      $query3 = "INSERT INTO education (user_id, school, gpa, edu_location, major, dates_attended, dates_graduated, degree, edu_description) VALUES ('$userId', '$school', '$gpa', '$edu_location', '$major', '$dates_attended', '$dates_graduated', '$degree', '$edu_description')";
  }

  $result3 = $db_handle->updateQuery($query3);

  if(!empty($result3))
  {
    header("Location: ../home/home.php");
    unset($_POST);
  }
  else
  {
    echo "ERROR";
  }


 
}

if(isset($_POST['updateExp']))
{

  $result4 = mysql_query("SELECT * FROM experience WHERE user_id = $userId");

  if(mysql_num_rows($result4) > 0) 
  {
      //echo "it is not empty";

    #PROFILE PAGE
/*DROP TABLE IF EXISTS experience;
create table experience(
    user_id int references user(user_id),
    company varchar(20) not null,
    exp_title varchar(50) not null,
    exp_location varchar(50) not null,
    time_period varchar(20) not null,
    exp_description varchar(500),
    primary key(user_id)
);*/
      $comma2 = " ";
      $whitelist2 = array(
      'user_id',
      'exp_company',
      'exp_title',
      'exp_location',
      'exp_time_begin',
      'exp_time_end',
      'exp_description'
      // ...etc
      );
      $query4 = "UPDATE experience SET";

      foreach($_POST as $key2 => $val2) 
      {
        if( ! empty($val2) && in_array($key2, $whitelist2)) 
        {
            $query4 .= $comma2 . $key2 . " = '" . mysql_real_escape_string(trim($val2)) . "'";
            $comma2 = ", ";
        }
        else
        {
          header("Location: ../home/home.php");
          unset($_POST);
        }
      }
      $query4 .= " WHERE user_id = '$userId'";
  }
  else
  {
      //echo "it is empty";
      $exp_company = $_POST['exp_company'];
      $exp_title = $_POST['exp_title'];
      $exp_location = $_POST['exp_location'];
      $exp_time_begin = $_POST['exp_time_begin'];
      $exp_time_end = $_POST['exp_time_end'];
      $exp_description = $_POST['exp_description'];

      $query4 = "INSERT INTO experience (user_id, exp_company, exp_title, exp_location, exp_time_begin, exp_time_end, exp_description) VALUES ('$userId', '$exp_company', '$exp_title', '$exp_location', '$exp_time_begin', '$exp_time_end', '$exp_description')";
  }

  $result4 = $db_handle->updateQuery($query4);

  if(!empty($result4))
  {
    header("Location: ../home/home.php");
    unset($_POST);
  }
  else
  {
    echo "ERROR";
  } 
}

if(isset($_POST['updateVInfo']))
{
  $result5 = mysql_query("SELECT * FROM volunteer WHERE user_id = $userId");

  if(mysql_num_rows($result5) > 0) 
  {

/*
DROP TABLE IF EXISTS volunteer;
create table volunteer(
    user_id int references user(user_id),
    organization varchar(50) not null,
    role varchar(50),
    cause varchar(50) not null,
    vol_start_date varchar(20),
    vol_end_date varchar(20),
    vol_description varchar(500),
    primary key(user_id)
);
*/
      $comma3 = " ";
      $whitelist3 = array(
      'user_id',
      'organization',
      'role',
      'cause',
      'vol_start_date',
      'vol_end_date',
      'vol_description'
      // ...etc
      );
      $query5 = "UPDATE volunteer SET";

      foreach($_POST as $key3 => $val3) 
      {
        if(!empty($val3) && in_array($key3, $whitelist3)) {
            $query5 .= $comma3 . $key3 . " = '" . mysql_real_escape_string(trim($val3)) . "'";
            $comma3 = ", ";
        }
        else
        {
          header("Location: ../home/home.php");
          unset($_POST);
        }
      }

      $query5 .= " WHERE user_id = '$userId'";
  }
  else
  {
      //echo "it is empty";
      $organization = $_POST['organization'];
      $role = $_POST['role'];
      $cause = $_POST['cause'];
      $vol_start_date = $_POST['vol_start_date'];
      $vol_end_date = $_POST['vol_end_date'];
      $vol_description = $_POST['vol_description'];

      $query5 = "INSERT INTO volunteer (user_id, organization, role, cause, vol_start_date, vol_end_date, vol_description) VALUES ('$userId', '$organization', '$role', '$cause', '$vol_start_date', '$vol_end_date', '$vol_description')";
  }

  //echo $query5;

  $result5 = $db_handle->updateQuery($query5);

  if(!empty($result5))
  {
    header("Location: ../home/home.php");
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit information</title>

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

    <hr>
    <div class="container">
         <div class="content">
                  <form action="edit_your_profile.php" method="post">
                      <h2>Basic information</h2>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>First name</label>
                                  <input type="text" class="form-control"  name="fname" value="<?php echo $row['first_name']?>" disabled>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Last name</label>
                                  <input type="text" class="form-control"  name="lname" value="<?php echo $row['last_name']?>" disabled>
                              </div>
                          </div>
                          <!-- put a select choice here -->
                          <div class="col-md-3">
                              <div class="form-group">

                                   <label for="choiceID">Gender</lable>
                                   <select class="form-control" id="choiceID">
                                     <option selected="true" style="display:none;"></option>
                                     <option>Male</option>
                                     <option>Female</option>
                                     <option>Don't Know</option>
                                   </select>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" class="form-control"  name="title">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label>Interests</label>
                                  <input type="text" class="form-control"  name="area_of_interest">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control"  name="email">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Country#</label>
                                <input type="text" class="form-control" name="countryNum" placeholder="+1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone">
                            </div>
                        </div>

                      </div>


                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" class="form-control" placeholder="Home Address" name="address">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>City</label>
                                  <input type="text" class="form-control"  name="city">
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>State/Province</label>
                                  <input type="text" class="form-control"  name="state">
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Country</label>
                                  <input type="text" class="form-control"  name="country">
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label>Postal Code</label>
                                  <input type="number" class="form-control"  name="zipcode">
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
                                  <input type="text" class="form-control" placeholder="" name="school">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Major </label>
                                  <input type="text" class="form-control"  name="major">
                              </div>
                          </div>
                          <div class="col-md-1">
                              <div class="form-group">
                                  <label>GPA </label>
                                  <input type="text" class="form-control"  name="gpa">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <!-- put datepicker here -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Attended since </label>
                                <input type="text" class="datepicker form-control"  name="dates_attended" placeholder="month / day / year">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Graduation date </label>
                                <input type="text" class="datepicker form-control"  name="dates_graduated" placeholder="month / day / year">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <!--
                                <label>Degree </label>
                                <input type="text" class="form-control"  name="degree" placeholder="bachelor?">
                              -->
                              <label for="degreeID">Degree</lable>
                              <select class="form-control" id="degreeID">
                                <option selected="true" style="display:none;"></option>
                                <option>Bachelor </option>
                                <option>Master </option>
                                <option>Doctor </option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>University Location </label>
                                <input type="text" class="form-control"  name="edu_location">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Education Description</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="edu_description"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                         <button type="submit" name="updateEdu" class="btn btn-info btn-fill pull-right">Update Education Info</button>
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
                                <input type="text" class="form-control" placeholder="" name="exp_company">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>title </label>
                                <input type="text" class="form-control"  name="exp_title">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Time begin </label>
                                <input type="text" class="datepicker form-control"  name="exp_time_begin" placeholder="month / day / year">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Time end </label>
                                <input type="text" class="datepicker form-control"  name="exp_time_end" placeholder="month / day / year">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Company location </label>
                                <input type="text" class="form-control"  name="exp_location">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Working Description</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="exp_description"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                         <button type="submit" name = "updateExp" class="btn btn-info btn-fill pull-right">Update Experience Info</button>
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
                                <input type="text" class="form-control" placeholder="" name="organization">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Role </label>
                                <input type="text" class="form-control"  name="role">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date begin </label>
                                <input type="text" class="datepicker form-control"  name="vol_start_date" placeholder="month / day / year">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date end </label>
                                <input type="text" class="datepicker form-control"  name="vol_end_date" placeholder="month / day / year">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Motivations to volunteer</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="cause"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Volunteer Description</label>
                                  <textarea rows="5" class="form-control" placeholder="Here can be your description" name="vol_description"></textarea>
                              </div>
                          </div>
                      </div>
                     <div class="row">
                        <button type="submit" name="updateVInfo" class="btn btn-info btn-fill pull-right">Update Volunteer Info</button>
                     </div>
                   </form>
                    <hr>
            </div>
    </div>




</body>
</html>
