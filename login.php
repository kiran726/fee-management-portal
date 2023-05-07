<?php
session_start();
include "db_config.php";
$username = $_POST['user_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE USER_ID = '$username' AND PASSWORD = '$password';";
$result = $con->query($sql);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'];
        #$_SESSION['sessionId'] = $session;
        $_SESSION['userid'] = $row['USER_ID'];
        
        $result = $con->query("SELECT USER_TYPE FROM users, user_status WHERE users.USER_STATUS_ID = user_status.USER_STATUS_ID AND USER_ID = '$username';");
        
        $row = $result->fetch_assoc();
        $_SESSION['userstatus'] = $row['USER_TYPE'];
        if ($row['USER_TYPE'] == 'admin') {
            $page = '../fms/admin/index.php';
        }
        elseif ($row['USER_TYPE'] == 'student') {
            $page = '../fms/accounts/index.php';
        }
       
    }
    else {
        $_SESSION['signinerror'] = 'Incorrect username or password.';
        $page = '../fms/index.php';
    }
    header("Location: $page");
?>