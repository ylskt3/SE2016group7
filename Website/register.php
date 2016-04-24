<?php

//if(isset($_POST['register']))
//{
	require_once("dbcontroller.php");
  $db_handle = new DBController();
  $query = "INSERT INTO user (username, password, email, last_name, first_name) VALUES
  ('" . $_POST["reg_user"] . "', '" . $_POST["reg_pass"] . "', '" . $_POST["email"] . "', '" . $_POST["last_name"] . "', '" . $_POST["first_name"] . "')";
  $result = $db_handle->insertQuery($query);
  if(!empty($result))
  {
		session_start();
		$_SESSION['user'] = $_POST["reg_user"];
    header("Location: home/home.php");
    unset($_POST);
  }
  else
  {
    echo "ERROR";
    header("Location: index.php");
  }
//}
?>
