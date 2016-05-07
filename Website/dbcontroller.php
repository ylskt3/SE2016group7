<?php
$host = 'us-cdbr-azure-central-a.cloudapp.net';
$user = 'b35816f4d91dbd';
$password = 'bcafd0d0';
$database = 'se2016group7';


class DBController {
	private $host = "us-cdbr-azure-central-a.cloudapp.net";
	private $user = "b35816f4d91dbd";
	private $password = "bcafd0d0";
	private $database = "se2016group7";



	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}


	function connectDB() {
		$conn = mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}

	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}

	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;
	}

	function updateQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}

	function insertQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}

	function selectQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}

	function deleteQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
}
?>
