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
	   <div class="container" >
	      <div class="row">
	         <div class="col-md-4 col-sm-4 col-xs-3"></div>
	            <div class="col-md-4 col-sm-4 col-xs-6">
	                <h2>Login</h2>
		              <form action = "index.php" method="POST" >
		                  <div class="row form-group">
								<input class='form-control' type="text" name="username" placeholder="username">
						  </div>
						  <div class="row form-group">
								<input class='form-control' type="password" name="password" placeholder="password">
						  </div>
						  <div class="row form-group">
								<input class=" btn btn-info" type="submit" name="submit" value="Login"/>
								<a class='btn btn-primary' href='enroll.php'>Register</a>
						 </div>
		               </form>
		        </div>    
	     </div>
		<?php
		     if(isset($_POST['submit'])){
		         $_SESSION['login'] = false;
		         $link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "be39412997950d", "64afb4b6", "cs3380-zzyrd") or die("Connect Error ". mysqli_error($link));
		         $sql = "SELECT usertype, salt, hashed_password FROM user WHERE username = ?";
		         $_SESSION['username'] = $_POST['username'];
		         
		         if($stmt = mysqli_prepare($link, $sql)){
		             mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
		             if(mysqli_stmt_execute($stmt)) {
                          mysqli_stmt_bind_result($stmt, $usertype, $salt, $hpassword);
                         
                         if(mysqli_stmt_fetch($stmt)!= NULL){
                             $_SESSION['usertype'] = $usertype;
                               if (password_verify($salt.$_POST['password'], $hpassword)) {
                                         if($_SESSION['username'] == "admin"){
                                              $_SESSION['login'] = true;
                                              header("Location: admin.php");
                                         }
                                         else{
                                             $_SESSION['login'] = true;
                                             header("Location: users.php"); 
                                         }
                                      
                                } 
                                else{
                                       echo "<h4>Invalid password</h4>";
                                }
                         } 
                         else{
							  echo "<h4>No valid username was found</h4>";
					     }
				     }
		           mysqli_stmt_close($stmt); 
		         }
		      mysqli_close($link);
		    }
		?>
	  </div>
	</body>
</html>
