<?php
require 'current_page.php';
require 'connection.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Login</title>
</head>
<body>

<?php
$usernamesignup = $_POST['usernamesignup'];
$passwordsignup = $_POST['passwordsignup'];
echo $usernamesignup;
$query = "SELECT `user_id` FROM `users` WHERE `usernamesignup`='".mysql_real_escape_string($usernamesignup)."' AND `passwordsignup`='".mysql_real_escape_string($passwordsignup)."' ";
if($query_run = mysql_query($query)){
	$query_num_rows = mysql_num_rows($query_run);
	if($query_num_rows==0){
		echo 'user does not exist ... Please try again....';
	} 	else if($query_num_rows==1){
		$user_id = mysql_result($query_run,0,'user_id');
		$_SESSION['user_id']= $user_id;
		$session_id = session_id();
		echo $session_id;
		$query ="UPDATE `users` SET `session`= '$session_id'"; 
		/*  WHERE `user_id`= $user_id"); */
		$query_run = mysql_query("UPDATE `users` SET `session`= '$session_id'");
		echo $user_id; 
		header('Location: ledger.php');
		
		}
	}
else echo"Hello";

?>

</body>
</html>