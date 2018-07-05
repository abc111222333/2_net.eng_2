<?php
include 'public/config/db.php';
$db = new class_db();

@$menu = $_POST['menu'];
if ($menu == "delete_user") {
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_user WHERE id=?";
    $sql_delete_rezome = "DELETE FROM tbl_rezome WHERE userid=?";
    $data_array = array($id);
    $delete_result = $db->myquery($sql, $data_array);
    $delete_rezome_result = $db->myquery($sql_delete_rezome, $data_array);
    if ($delete_result == 1 and $delete_rezome_result == 1) {
        echo 1;
    } else {
        echo 0;
    }
}


?>