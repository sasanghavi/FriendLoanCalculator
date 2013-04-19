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


 //Read your session (if it is set)
 /*   if (isset($_SESSION['user_id']))
      echo $_SESSION['user_id'];
 */

echo session_id();
$friend = $_POST['friend'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$user_id = $_SESSION['user_id'];
$session_id = session_id();
/* $query11 = mysql_query("SELECT * FROM `users` WHERE `session` = '$session_id'");
$row = mysql_fetch_array($query11);
$user_id = $row['user_id'];
echo $row['user_id'];
echo $user_id; */
$query1 = "SELECT * FROM `jane` WHERE ((`friend` = '$friend' AND 'user_id' = '$user_id') OR (`email` = '$email' AND 'user_id' = '$user_id') )";
$query1_run = mysql_query($query1);
if($query_rows = mysql_num_rows($query1_run)){
$msg = "firend already exists";
 echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
/* echo 'firend already exists'; */
}	else{
$msg = "Successfully Added $friend as your friend";
$query = "INSERT INTO `jane`(`id`,`friend`, `email`, `contact`, `user_id`) VALUES ('','".mysql_real_escape_string($friend)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($contact)."','".mysql_real_escape_string($user_id/* _SESSION['user_id'] */)."')";
$query_run = mysql_query($query);
echo '<script type="text/javascript">alert("' . $msg . '"); </script>';

}
header ('Location:ledger.php');
?>
</body>

</html>
