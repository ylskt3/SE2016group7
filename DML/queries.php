<?php

	$hostname = "us-cdbr-azure-central-a.cloudapp.net";
	$username = "bf4cd4b8bbfb2e";
	$password = "8d5baa2f";

     if(isset($_POST['submit'])){
         $_SESSION['login'] = false;
         $link = mysqli_connect($hostname,$username,$password) or die("Connect Error ". mysqli_error($link));
         $sql = "SELECT username, salt, hashed_password FROM user WHERE username = ?";
         $_SESSION['username'] = $_POST['username'];
         
         if($stmt = mysqli_prepare($link, $sql)){
             mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
             if(mysqli_stmt_execute($stmt)) {
                  mysqli_stmt_bind_result($stmt, $username, $salt, $hpassword);
                 
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
