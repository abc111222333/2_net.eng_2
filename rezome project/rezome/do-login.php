<?php
session_start();
include 'public/config/db.php';
$db = new class_db();

@$menu = $_POST['menu'];
if ($menu == "do_login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT tbl_user.*
FROM tbl_user where username=? and password=?";
    $data_array = array($username, $password);
    $fetch_result = $db->doSelect($sql, $data_array, 1);
    $fetch_result_num = $db->num($sql, $data_array, 1);

    if ($fetch_result_num == 1) {
        echo 1;
        $_SESSION['username'] = $fetch_result['username'];
        $_SESSION['fullname'] = $fetch_result['fullname'];
    } else {
        echo 0;
    }
}

if ($menu == "do_logout") {
    session_destroy();
    $_SESSION = [];

    echo 1;
}

?>