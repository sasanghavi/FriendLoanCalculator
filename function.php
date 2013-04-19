<?php
require 'current_page.php';
require 'connection.php';
/* require 'ledger.php'; */
?>

<?php
session_start();
echo "Friend id is : ";
//echo $_SESSION['frnd_id'];
echo $_POST['hdnfield'];
//echo $info['id'];
?>