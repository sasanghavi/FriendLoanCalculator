<?php
require 'current_page.php';
require 'connection.php';
?>

<html>
<head>
<title>
My Ledger
</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />



<link href="css2/style.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="css2/style9.css" />

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
 <script type="text/javascript" src="css2/jquery-1.9.0.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css2/demo.css" />    
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
        <style type="text/css">
		
<!--
.Stile1 {color: #333333}
--> </style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
 <script type="text/javascript" src="css2/jquery-1.9.0.min.js"></script>
   

<script type="text/javascript" src="css2/jquery.min.js"></script>
<style type="text/css"></style>

<script type="text/javascript" src="css2/jquery.min.js"></script><style type="text/css">
																</style>
		<script type="text/javascript" src="css2/jquery.leanModal.min.js"></script>
		<script type="text/javascript">
			$(function() {
    			$('a[rel*=leanModal]').leanModal({ top : 100, closeButton: ".modal_close" });		
			});

            function passID (fid) {
                $('input[name=hdnfield]').val(fid);
                $("form#dummyform").submit();
            }
		</script>

</head>
<body background="images/bg.png">

<?php
/* $sql = "SELECT `friend`, `email`, `contact`, `id`, `credit`, `debit`, `total`, `note`, `bool`, `thing`, `user_id` FROM `jane` WHERE `user_id`=\'$_SESSION["user_id"]\'";
$query111 = mysql_query("SELECT `friend`,`credit`, `debit`, `total`, `note`, `thing` FROM `jane` WHERE `user_id`= $user_id ");
$row = mysql_fetch_array($query111);
$user_id = $row['friend'];
 */
 
  echo "<br/>";
 echo "<br/>";
 echo " <h1> mi amigos</h1>";
 /* echo "(sorted on the basis of start time)"; */
 echo "<br/>";
 $user_id = $_SESSION['user_id'];
 $data2 = mysql_query("SELECT `friend`,`credit`, `id`, `debit`, `total`, `note`, `thing` FROM `jane` WHERE `user_id`= $user_id ");
 /* or die(mysql_error()); */ 
 /* Print "<table border cellpadding=5 bgcolor=#F1E9E3>";   */
 while($info = mysql_fetch_array( $data2 )) 
 { 
  /* Print "<tr>";  */
/*  Print "<th>Friend Name:</th> <td>".$info['friend'] . "</td> "; 
 Print "<th>Credit:</th> <td>".$info['credit'] . "</td> ";  
 Print "<th>Debit:</th> <td>".$info['debit'] . "</td> "; 
 Print "<th>Total:</th> <td>".$info['total'] . " </td>";
 Print "<th>Note :</th> <td>".$info['note'] . "</td> ";
 Print "<th>Thing :</th> <td>".$info['thing'] . "</td> ";
 Print " </tr>"; */  /* echo "<a href ='https://google.com'>"; */
 echo "<a href='#' id='go' onclick='passID(".$info['id'].")' class='button_add2'><table cellpadding=5><tr><td>".$info['friend']."&nbsp; &nbsp;".$info['credit']."</td><td>".$info['debit']."</td></tr>&nbsp; &nbsp;</table></a>";
 //echo "<form action='function.php' method='POST'><input type='hidden' name='frnd_id' value='". $info['friend'] ."' />";
 /* echo $info['friend']."\t"; */
 echo $info['credit']."\t";
  echo $info['id']."\t";
 echo $info['debit']."\t";
 echo $info['total']."\t";
 echo $info['note']."\t";
 echo $info['thing']."<br/><br/>";
 echo "</a>";
 
 
 
 } 
  /* Print "</table>";  */
 
 
 
 
?>


<div class="content" >
<div id="pop"><form class="contact_form" action="friend.php" method="post" name="contact_form">
    <ul>
	    <li>
             <h2><b>Add an amigo<b> </h2>
             
        </li>
		<li>
            <label for="name">Name:</label>
            <input type="text" name="friend" placeholder="Jane Doe" required />
			
        </li>
		<li>
            <label for="website">Email-id</label>
            <input type="text" name="email" placeholder="janedoe@gmail.com" required/>
            <span class="form_hint">Proper format janedoe@gmail.com</span>
        </li>
        <li>
            <label for="weebsite">Contact no.:</label>
            <input type="text" name="contact" placeholder="eg. 9408750748 "  required/>
            <span class="form_hint">Proper format 10 digits</span>
        </li>
        <ul>
                	<button class="submit" type="submit"> Add amigo</button>
        
    </ul>
</form></div>
</div>

<footer id="footer">
<a href="#pop" id="go" rel="leanModal" class="button_add">+ Friend</a>
 <div id="logout">
<form action="logout.php" method="POST" >
<input type="submit" value="Logout" />
</form>
<div><form action="function.php" method="POST" id="dummyform">
    <input name="hdnfield" type="hidden" value=""/>
</form></div>
</div>
</footer>
</body>
</html>