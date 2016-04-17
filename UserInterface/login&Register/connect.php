<?php
$hostname="us-cdbr-azure-central-a.cloudapp.net"; //local server name default localhost
$username="b84c6dec732d41";  //mysql username default is root.
$password="cc33ed14";       //blank if no password is set for mysql.
$database="se2016group7";  //database name which you created
$con=mysql_connect($hostname,$username,$password);
if(! $con)
{
die('Connection Failed'.mysql_error());
}

mysql_select_db($database,$con);
?>

