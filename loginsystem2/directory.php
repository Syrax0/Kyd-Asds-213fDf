<?php
//include_once 'header.php';
//include "database connetion file";
//include "functions file";

//$username=$_SESSION['username'];
//$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
//$fetch = mysqli_fetch_object($query);
//if($fetch->status == "banned"){
//echo "<table width=\"400\" border=\"1\" align=\"center\" cellpadding=\"3\" class=\"tableborder2\">
//<tr class=\"header\"><td align=\"center\">Error!</td></tr>
//<tr><td align=\"center\">Sorry you have been banned from GAME NAME if you feel this is unfair please contact us at EMAIL ADDY</td></tr>
//</table>";
//exit();
//}
?>


<head>
<title>GAME NAME : Logged In!</title>
</head>
<FRAMESET ROWS="110,*,25" FRAMEBORDER=0 BORDER=0 >
<FRAME NAME="top" SRC="STATS.php" MARGINHEIGHT=0 MARGINWIDTH=0 SCROLLING=No NORESIZE>
<FRAMESET COLS="86,640,90" FRAMEBORDER=0 BORDER=0 >
<FRAME NAME="left" SRC="menu_left.php" SCROLLING=AUTO NORESIZE>
<frame src="main.php" name="middle" id="middle" noresize="noresize" frameborder="0"/>
    <FRAME NAME="right" SRC="menu_right.php" SCROLLING=AUTO NORESIZE></FRAME></FRAME>
</FRAMESET>
<FRAMESET ROWS="2" FRAMEBORDER=0 BORDER=0 >
    <FRAME NAME="bottom" SRC="mini22.php" MARGINHEIGHT=0 MARGINWIDTH=0 SCROLLING=No NORESIZE></FRAME>
</FRAMESET>