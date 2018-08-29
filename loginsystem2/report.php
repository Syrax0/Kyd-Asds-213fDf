<?php 
//include'functions.php';
include_once'header.php';
//require_once'db_connect.php';
//session_start();



if(isset($_POST['Submit'])) {
if($_POST['report'] == '' || $_POST['report'] == ' ') {
echo"You need to enter a message!";
}else{
$query = mysqli_query("SELECT username FROM users WHERE admin = 'y'");
while($res = mysqli_fetch_array($query)) {
mysqli_query("INSERT INTO inbox (message, subject, time, username, sender) VALUES ('$_POST[report]', 'Abuse Report', '$now', '$res[0]', '$user')") or die(mysqli_error());
}
echo"<center>Report sent, an admin will get back to you when they get the message!</center>";
}}else{
echo"<form name='form1' method='post' action=''>
<table width='400' border='1' align='center' class='tableborder2'><tr class='header'><td><div align='center'>Report Abuse </div></td></tr><tr>
<td><div align='center'>Here you may report any bugs for our team to investigate or report any abuse you may have received to our customer care, all reports go directly too admins so if its a staff complaint it will be anonymous. Please explain what the issue is the best you can so our team can help in the best possible way.  </div></td>
</tr><tr><td><div align='center'><textarea name='report' cols='60' rows='10' id='report' class='textinput'></textarea></div></td></tr><tr><td><div align='center'><input type='submit' name='Submit' value='Submit' class='button'></div></td></tr></table></form>";
}

include'footer.php';
?>