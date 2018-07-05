<?php


include 'public/config/db.php';
$db = new class_db();
$sql = "SELECT tbl_rezome.*,tbl_user.*
FROM tbl_user
LEFT JOIN tbl_rezome on tbl_rezome.userid=tbl_user.id where type=2";
$array_students_rezome = $db->doSelect($sql, array());


?>

<!-- Modal -->
<div class="modal fade" id="edit-user-rezome-Modal" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">مدیریت رزومه</h4>
            </div>
            <div class="modal-body">


                <form id="form-edit-rezome">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">ایمیل</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">عنوان رزومه</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="عنوان رزومه">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="uni-state">استان محل تحصیل</label>
                        <input type="text" class="form-control" id="uni-state" name="uni-state"
                               placeholder="استان محل تحصیل">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="uni-city">شهر محل تحصیل</label>
                        <input type="text" class="form-control" id="uni-city" name="uni-city">
                    </div>
                    <div class="form-group">
                        <label for="uni-address">آدرس دانشگاه</label>
                        <input type="text" class="form-control" id="uni-address" name="uni-address"
                               placeholder="آدرس دانشگاه">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="home-state">استان محل سکونت</label>
                        <input type="text" class="form-control" id="home-state" name="home-state"
                               placeholder="استان محل سکونت">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="home-city">شهر محل سکونت</label>
                        <input type="text" class="form-control" id="home-city" name="home-city">
                    </div>
                    <div class="form-group">
                        <label for="home-address">آدرس منزل</label>
                        <input type="text" class="form-control" id="home-address" name="home-address"
                               placeholder="آدرس منزل">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reshte">رشته</label>
                            <input type="text" class="form-control" id="reshte" name="reshte"
                                   placeholder="استان محل سکونت">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="grayesh">گرایش</label>
                            <input type="text" class="form-control" id="grayesh" name="grayesh">
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="moadel">معدل</label>
                            <input type="text" class="form-control" id="moadel" name="moadel">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sal">سال فارغ التحصیلی</label>
                            <input type="number" class="form-control" id="sal" name="sal"
                                   placeholder="سال فارغ التحصیلی">

                        </div>


                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button onclick="edit_rezome()" class="btn btn-primary" data-id="" id="edit-rezome-btn"
                        data-dismiss="modal">ثبت
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن فرم</button>
            </div>
        </div>

    </div>
</div>


<div>

    <h2>لیست روزمه دانشجویان</h2>
    <table class="table">
        <thead>
        <tr>
            <th>نام دانشجو</th>
            <th>عنوان رزومه</th>
            <th>ویرایش</th>

        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($array_students_rezome as $row) {

            echo '      <tr>
                <td>' . $row['fullname'] . '</td>
                <td>' . $row['title'] . '</td>
                <td><a  onclick="fetch_rezome_data(' . $row['id'] . ');"  data-toggle="modal" data-target="#edit-user-rezome-Modal" style="cursor: pointer">ویرایش</a></td>
              
          
            </tr> ';
        }

        ?>

        </tbody>
    </table>

</div>