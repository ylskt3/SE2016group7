<!DOCTYPE html>
<html>
<head>
	<title>WRONG USERNAME OR PASSWORD</title>
	<style>
        body {
            text-align: center;
        }
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<h1 class="error">Error</h1>
	<p>SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE GO BACK TO LOGIN PAGE TO RETRY...</p>
</body>
</html>


<?php
define('DB_HOST', 'us-cdbr-azure-central-a.cloudapp.net');
define('DB_NAME', 'se2016group7');
define('DB_USER', 'b84c6dec732d41');
define('DB_PASSWORD','cc33ed14');
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function SignIn()
{
  session_start();

  if(!empty($_POST['user']))
  {
    $query = mysql_query("SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
    $row = mysql_fetch_array($query) or die(mysql_error());
    if(!empty($row['userName']) AND !empty($row['pass']))
    {
      $_SESSION['userName'] = $row['pass'];
      header("Location: home/home.php");
      exit;
    }
  }
  else
  {
    echo "RETRY, ENTER ID AND PASSWORD";
    header("Location: index.php");
    exit;
  }
}
if(isset($_POST['submit']))
{
  SignIn();
}
?>
