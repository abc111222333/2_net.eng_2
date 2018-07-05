<?php
include 'public/config/db.php';
$db = new class_db();

@$menu = $_POST['menu'];
if ($menu == "edit_user") {
    $username = $_POST['username'];
    $fullname = $_POST['name'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $type = 2;
    $sql = "UPDATE  tbl_user SET username=?
,fullname=?
,password=?
,type=? where id=?";
    $data_array = array($username, $fullname, $password, $type, $id);
    $edit_result = $db->myquery($sql, $data_array);
    if ($edit_result == 1) {
        echo 1;
    } else {
        echo 0;
    }
}


if ($menu == "edit_rezome") {
    $title = $_POST['title'];
    $email = $_POST['email'];
    $uni_state = $_POST['uni-state'];
    $uni_city = $_POST['uni-city'];
    $uni_address = $_POST['uni-address'];
    $home_state = $_POST['home-state'];
    $home_city = $_POST['home-city'];
    $home_address = $_POST['home-address'];
    $reshte = $_POST['reshte'];
    $grayesh = $_POST['grayesh'];
    $moadel = $_POST['moadel'];
    $sal = $_POST['sal'];
    $id = $_POST['id'];

    $sql = "UPDATE  tbl_rezome SET title=?
,email=?
,uni_state=?
,uni_city=?
,uni_address=?
,home_state=?
,home_city=?
,home_address=?
,reshte=?
,grayesh=?
,moadel=?
,sal=?
 where id_r=?";
    $data_array = array($title, $email, $uni_state, $uni_city, $uni_address, $home_state, $home_city, $home_address, $reshte, $grayesh, $moadel, $sal, $id);
    $edit_result = $db->myquery($sql, $data_array);
    if ($edit_result == 1) {
        echo 1;
    } else {
        echo 0;
    }
}

?>