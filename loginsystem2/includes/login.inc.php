<?php

session_start();

if (isset($_POST['submit'])) {
    
    include 'dbh.inc.php';
    
    
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //error handlers]
    // check if inputs are empty
    
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid ='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if ($resultcheck < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                // de-hash pass
                $hashedPwdcheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdcheck == false) {
                    header("Location: ../index.php?login=error");
                    exit();
                } elseif ($hashedPwdcheck == true) {
                    // lock in user here
                    $_SESSION['u_id'] = $row['user_id']; 
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    header("Location: ../directory.php");
                    exit();
                }
            }
         }
    }
} else {
    header("Location: ../index.php?login=error");
    exit();
}