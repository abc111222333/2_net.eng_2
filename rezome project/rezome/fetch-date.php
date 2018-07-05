<?php
include 'public/config/db.php';
$db = new class_db();

@$menu = $_POST['menu'];
if ($menu == "fetch_user") {
    $id = $_POST['id'];

    $sql = "SELECT tbl_rezome.*,tbl_user.*
FROM tbl_user
LEFT JOIN tbl_rezome on tbl_rezome.userid=tbl_user.id where id=?";
    $data_array = array($id);
    $fetch_result = $db->doSelect($sql, $data_array, 1);
    echo json_encode($fetch_result);

}


if ($menu == "fetch_rezome") {
    $id = $_POST['id'];

    $sql = "SELECT tbl_rezome.*,tbl_user.*
FROM tbl_user
LEFT JOIN tbl_rezome on tbl_rezome.userid=tbl_user.id where id=?";
    $data_array = array($id);
    $fetch_result = $db->doSelect($sql, $data_array, 1);
    echo json_encode($fetch_result);

}

?>