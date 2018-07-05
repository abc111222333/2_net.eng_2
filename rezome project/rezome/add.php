<?php
include 'public/config/db.php';
$db = new class_db();

@$menu = $_POST['menu'];
if ($menu == "add_user") {
    $username = $_POST['username'];
    $fullname = $_POST['name'];
    $password = $_POST['password'];
    $type = 2;

    $sql = "INSERT INTO tbl_user (username,fullname,password,type) values (?,?,?,?)";
    $sql_get_last_id = "SELECT * from tbl_user order by id desc";
    $sql_add_field_rezome = "INSERT INTO tbl_rezome (userid) values (?)";
    $array_students_rezome = $db->doSelect($sql, array());
    $data_array = array($username, $fullname, $password, $type);
    $add_result = $db->myquery($sql, $data_array);
    $sql_get_last_id_result = $db->doSelect($sql_get_last_id, array(), 1);
    $add_field_rzome_result = $db->myquery($sql_add_field_rezome, array($sql_get_last_id_result['id']));

    if ($add_result == 1) {
        echo 1;
    } else {
        echo 0;
    }
}

?>