<!--Name ZHIHAO ZHANG
    ID 14192560
    CS3380
-->
<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    exit;
	}
?>

<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h2>Create a user</h2>
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<div class="row form-group">
								<input class='form-control' type="text" name="username" placeholder="username">
						</div>
						<div class="row form-group">
								<input class='form-control' type="password" name="password" placeholder="password">
						</div>
						<div class="row form-group">
								<input class=" btn btn-info" type="submit" name="submit" value="Register"/>
								<a class='btn btn-primary' href='index.php'>Go Back</a>
						</div>
					</form>
				</div>
			</div>
			<?php
				if(isset($_POST['submit'])) { // Was the form submitted?
					
					$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "be39412997950d", "64afb4b6", "cs3380-zzyrd") or die("Connect Error ". mysqli_error($link));
					$sqlAdmin = "INSERT INTO user(username, usertype, salt, hashed_password) VALUES (?,'administration',?,?)";
					$sql = "INSERT INTO user(username, usertype, salt, hashed_password) VALUES (?,'general user',?,?)";
					if($_POST['username'] == ''){
					     echo "<h4>You have to enter some characters in usename field</h4>";
					}
					else if($_POST['username'] == "admin"){
					            if ($stmt = mysqli_prepare($link, $sqlAdmin)) {
						          $user = $_POST['username'];
						          $salt = mt_rand();
						          $hpass = password_hash($salt.$_POST['password'], PASSWORD_BCRYPT)  or die("bind param");
						          mysqli_stmt_bind_param($stmt, "sss", $user, $salt, $hpass) or die("bind param");
						            if(mysqli_stmt_execute($stmt)) {
							               echo "<h4>Success</h4>";
						            } 
						            else {
							               echo "<h4>You cannot register your usename as same as admin!</h4>";
						            }
						             mysqli_stmt_close($stmt);
					            } 
					            else {
						             die("prepare failed");
					           } 
					}
					else{
					           if ($stmt = mysqli_prepare($link, $sql)) {
						         $user = $_POST['username'];
						         $salt = mt_rand();
						         $hpass = password_hash($salt.$_POST['password'], PASSWORD_BCRYPT)  or die("bind param");
						         mysqli_stmt_bind_param($stmt, "sss", $user, $salt, $hpass) or die("bind param");
						           if(mysqli_stmt_execute($stmt)) {
							             echo "<h4>Success</h4>";
						           } 
						           else {
							             echo "<h4>username already existed!</h4>";
						           }
						            mysqli_stmt_close($stmt);
					           } 
					           else {
						                 die("prepare failed");
					           }
					}
					mysqli_close($link);
				}
			?>
		</div>
	</body>
</html>