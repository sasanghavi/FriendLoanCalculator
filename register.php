<?php
require 'current_page.php';
require 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
$usernamesignup = $_POST['usernamesignup'];
$passwordsignup = $_POST['passwordsignup'];
$emailsignup = $_POST['emailsignup'];
$contact = $_POST['contact'];
echo $usernamesignup;
$query1 = "SELECT * FROM `users` WHERE `usernamesignup` = '$usernamesignup' OR `emailsignup` = '$emailsignup'";
$query1_run = mysql_query($query1);
if($query_rows = mysql_num_rows($query1_run)){
echo 'username or email already in use.Please try something else';
}	else{
$query = "INSERT INTO `users`(`user_id`,`usernamesignup`, `passwordsignup`, `emailsignup`, `contact`) VALUES ('','".mysql_real_escape_string($usernamesignup)."','".mysql_real_escape_string(($passwordsignup))."','".mysql_real_escape_string($emailsignup)."','".mysql_real_escape_string($contact)."')";
$query_run = mysql_query($query);
echo ' Successfully registered';
}
?>
</body>

</html>
