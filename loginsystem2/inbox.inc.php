<?php

include_once 'dbh.inc.php';
include_once 'func.inc.php';

$message = mysqli_real_escape_string($conn $_POST['message']);

if (empty($message)) {
    echo('Please Enter Message');
}


if(isset($_POST['delete_all'])){
mysqli_query($conn,"DELETE * FROM inbox WHERE username='$username'");
echo "All messages deleted";
}





$sql= "INSERT INTO inbox (user_uid, username, sender, subject, messsage, time, read, keep,)
VALUES ('$u_id' $username, $sender,$subject,$messsage,$time,$read,$keep);";