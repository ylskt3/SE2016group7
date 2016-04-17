<?php

function insertQuery($query) 
{
  $result = mysql_query($query);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  } else {
    return $result;
  }
}

if(isset($_POST['register']))
{
	session_start();
	require_once("connect.php");
  $db_handle = new DBController();
  $query = "INSERT INTO userName (userName, password, email, last_name, first_name) VALUES
  ('" . $_POST["userName"] . "', '" . $_POST["password"] . "', '" . $_POST["email"] . "', '" . $_POST["last_name"] . "', '" . $_POST["first_name"] . "')";
  $result = $db_handle->insertQuery($query);
  if(!empty($result)) 
  {
    header("Location: index.php");
  } 
  else 
  {
    header("Location: user.php");
  }
}
?>