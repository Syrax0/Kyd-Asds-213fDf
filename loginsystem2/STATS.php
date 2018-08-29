<?
session_start();
include "includes/dbh.inc.php";
include "includes/login.inc.php";
include "game/functions.php";
logincheck();
$username=$_SESSION['username'];

$time = time(); 
$timenow = time();

$fetch1=mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
$fetch=mysqli_fetch_object($fetch1);

$check = mysqli_query($con,"SELECT * FROM `inbox` WHERE `read`='n' AND `username`='$username'");
$inbox=mysqli_num_rows($check);

$gcc = mysqli_query($con,"SELECT * FROM cars WHERE owner='$username' AND id='$fetch->carid'");
$gcc2 = mysqli_fetch_object($gcc);

$fetch1=mysqli_query($con,"SELECT * FROM drivers WHERE manager='$username'");
$fetch2=mysqli_fetch_object($fetch1);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv='refresh' content='30;url=timers.php'>
<script type="text/javascript" src="includes/countdown.js"></script>
<title>Steet-Outlaws</title>
</head>
<style type="text/css">
body {
background-repeat: repeat;
background-image:url(images/timer.png);
color: white; 
font-size: 12px;
}
</style>
<body>
<table width='70%' height='100%' cellpadding="0" valign='bottom' align='center'>
<tr>
<td align="right" width="15%">Username:</td>
<td align="left"><font color="#FFFFCC"><? echo htmlentities($fetch->username); ?></font></td>
<td align="right" width="15%">Money:</td>
<td align="left"><font color="#FFFFCC">&pound;<? echo htmlentities(number_format($fetch->cash)); ?></td>
<td align="right" width="15%">Current Car:</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected"; 
}elseif($fetch->carid != "0"){ echo "$gcc2->name ($gcc2->id)"; } ?></font></td>
<td align="right" width="15%">Vehicle Speed:</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected"; 
}elseif($fetch->carid != "0"){ echo "$gcc2->speed Mph"; } ?></td>
</tr>
<tr>
<td align="right">Safe Cash:</td>
<td align="left"><font color="#FFFFCC">&pound;<? echo htmlentities(number_format($fetch->safe_cash)); ?></font></td>
<td align="right">Exp Gained:</td>
<td align="left"><font color="#FFFFCC"><? echo htmlentities(number_format($fetch->rep)); ?></font></td>
<td align="right">Vehicle Fuel:</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected";
}elseif($fetch->carid != "0"){ echo "".makecomma($gcc2->fuel)." Fuel"; } ?></font></td>
<td align="right">Vehicle Fuel Limit:</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected";
}elseif($fetch->carid != "0"){ echo "".makecomma($gcc2->fuel_limit)." Fuel Limit"; } ?></font></td>
</tr>
<tr>
<td align="right">Round Exp:</td>
<td align="left"><font color="#FFFFCC"><? echo htmlentities(number_format($fetch->round_rep)); ?></font></td>
<td align="right">Licence Points:</td>
<td align="left"><font color="#FFFFCC"><? echo htmlentities(number_format($fetch->licence_points)); ?>/100</font></td>
<td align="right">Vehicle Driftpoints:</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected";
}elseif($fetch->carid != "0"){ echo "".makecomma($gcc2->drift_points)." Points"; } ?></font></td>
<td align="right">Vehicle Mileage</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected";
}elseif($fetch->carid != "0"){ echo "".makecomma($gcc2->mileage)." Miles"; } ?></font></td>
</tr>
<tr>
<td align="right">Location:</td>
<td align="left"><font color="#FFFFCC"><? echo htmlentities($fetch->location); ?></font></td>
<td align="right">Prestige:</td>
<td align="left"><font color="#FFFFCC"><? echo htmlentities(number_format($fetch->prestige)); ?></font></td>
<td align="right">Vehicle Exp:</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected";
}elseif($fetch->carid != "0"){ echo "".makecomma($gcc2->vehicle_exp).""; } ?></font></td>
<td align="right">Vehicle Pretige:</td>
<td align="left"><font color="#FFFFCC"><? if($fetch->carid == "0"){ echo "No Car Selected";
}elseif($fetch->carid != "0"){ echo "$gcc2->prestige"; } ?></font></td>
</tr>
<tr>
<td colspan="8" align="center" style="padding:5px;">
<? if($inbox == "0") { echo "<font color='yellow'>Your have 0 new messages</font>";
}elseif($inbox != "0"){ echo "<a href='inbox.php' target='middle'><font color='lime'>You have ($inbox) new message(s)!</font></a>"; } ?>
</td>
</tr>
</table>