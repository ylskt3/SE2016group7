<?php

if(!session_start()) {
  header("Location: search_job.php");
  exit;
}
  //  $company = $_POST['company'];
  //  echo $_POST['company'];
  //  echo $_POST['job_title'];
  //  echo $_POST['description'];
//    echo $_POST['deadline'];
    echo "Company location:  " .$_POST['location'];
    echo "<br>";
    echo "Industry:  " . $_POST['industry'];
    echo "<br>";
    echo "Experience level reuqirement:  " . $_POST['experience_level'];
    echo "<br>";





?>
