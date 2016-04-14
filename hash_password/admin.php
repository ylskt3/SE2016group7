<!--Name ZHIHAO ZHANG
    ID 14192560
    CS3380
-->
<?php
	if($_SERVER['HTTPS'] != 'on') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}
?>
<?php
// Start the session
 session_start();
?>
<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
	</head>
	<body>
		<?php
		  if($_SESSION['login'] == true){
		     echo "<h2>";
		     echo "Welcome Admin!  You have super privileges! ";
		     echo "<br>";
		     echo "User Type:  " .$_SESSION['usertype'];
		     echo "</h2>";
		  }
		  if($_SESSION['login'] == false){
		     echo "<h2>";
		     echo "Wrong page! You are supposed to login first! ";
		     echo "</h2>";
		  }
		  if(isset($_POST['logout'])){
	                 // remove all session variables
                       session_unset(); 
                     // destroy the session 
                       session_destroy(); 
    
                       header("Location: index.php");
	         }
		 
		?>
		<div class="container" >
		<form action = "users.php" method="POST" >
		                  <div class="row form-group">
								<input class=" btn btn-info" type="submit" name="logout" value="Logout"/>		
						 </div>
		 </form>
		</div>
	</body>
</html>