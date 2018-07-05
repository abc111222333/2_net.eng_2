<?php


include 'public/config/db.php';
$db = new class_db();
$sql = "SELECT tbl_rezome.*,tbl_user.*
FROM tbl_user
left JOIN tbl_rezome on tbl_rezome.userid=tbl_user.id where tbl_user.type=2";
$array_students_rezome = $db->doSelect($sql, array());


?>

<!-- Modal -->
<div class="modal fade" id="edit-user-Modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">افزودن کاربر</h4>
            </div>
            <div class="modal-body">


                <form id="edit-user-form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">نام</label>
                            <input type="email" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">نام کاربری</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="نام کاربری">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password"> رمز </label>
                                <input type="email" class="form-control" id="password" name="password"
                                       placeholder="رمز عبور">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">تکرار رمز </label>
                                <input type="password" class="form-control" id="rep-password" name="rep-password"
                                       placeholder="تکرار رمز عبور">
                            </div>
                        </div>


                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="edit_user()" data-id="" id="edit-user-btn"
                        data-dismiss="modal">ویرایش
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن فرم</button>
            </div>
        </div>

    </div>
</div>


<div>

    <h2>لیست دانشجویان</h2>
    <table class="table">
        <thead>
        <tr>
            <th>نام دانشجو</th>
            <th>نام کاربری</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($array_students_rezome as $row) {

            echo '      <tr>
                <td>' . $row['fullname'] . '</td>
                <td>' . $row['username'] . '</td>
                <td><a onclick="fetch_user(' . $row['id'] . ');" data-toggle="modal" data-target="#edit-user-Modal" style="cursor: pointer">ویرایش</a></td>
                <td><a onclick="delete_user(' . $row['id'] . ');" data-toggle="modal" data-target="#myModal" style="cursor: pointer">حذف</a></td>
          
            </tr> ';
        }

        ?>

        </tbody>
    </table>

</div>