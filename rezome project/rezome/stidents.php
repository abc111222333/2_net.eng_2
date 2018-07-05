<?php

$sql = "SELECT tbl_rezome.*,tbl_user.*
FROM tbl_user
LEFT JOIN tbl_rezome on tbl_rezome.userid=tbl_user.id where tbl_user.type=2";
$array_students_rezome = $db->doSelect($sql, array());


?>

<div class="modal fade" id="show-rezome-Modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">مشاهده رزومه</h4>
            </div>
            <div class="modal-body">
                <form id="form-show-rezome-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">عنوان</label>
                            <span id="title" name="title"></span>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">ایمیل</label>
                            <span id="email" name="email"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fullname">نام کامل</label>
                            <span id="fullname" name="fullname"></span>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="uni-state">استان محل تحصیل</label>
                        <span id="uni-state" id="uni-state"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="uni-city">شهر محل تحصیل</label>
                        <span id="uni-city" id="uni-city"></span>
                    </div>
                    <div class="form-group">
                        <label for="uni-address">آدرس دانشگاه</label>
                        <span id="uni-address" id="uni-address"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="home-state">استان محل سکونت</label>
                        <span id="home-state" id="home-state"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="home-city">شهر محل سکونت</label>
                        <span id="home-city" id="home-city"></span></div>
                    <div class="form-group">
                        <label for="home-address">آدرس منزل</label>
                        <span id="home-address" id="home-address"></span></div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reshte">رشته</label>
                            <span id="reshte" id="reshte"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="grayesh">گرایش</label>
                            <span id="grayesh" id="grayesh"></span></div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="moadel">معدل</label>
                            <span id="moadel" id="moadel"></span></div>

                        <div class="form-group col-md-6">
                            <label for="sal">سال فارغ التحصیلی</label>
                            <span id="sal" id="sal"></span>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary">تایید</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن فرم</button>
            </div>
        </div>

    </div>
</div>


<div>

    <h2>لیست دانشجویان و رزومه انها</h2>
    <table class="table">
        <thead>
        <tr>
            <th>نام دانشجو</th>
            <th>عنوان</th>
            <th>مشاهده</th>
        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($array_students_rezome as $row) {

            echo '      <tr>
                <td>' . $row['fullname'] . '</td>
                <td>' . $row['title'] . '</td>
                <td><a onclick="fetch_rezome_data_for_show(' . $row['id'] . ');" data-toggle="modal" data-target="#show-rezome-Modal" style="cursor: pointer">mosh</a></td>
          
            </tr> ';
        }

        ?>

        </tbody>
    </table>


</div>
<script>

    function fetch_rezome_data_for_show(id) {
        var menu = "fetch_rezome";
        var id = id;
        $.ajax({
            dataType: 'json',
            url: 'fetch-date.php',
            type: 'POST',
            async: false,
            data: {
                menu: menu,
                id: id
            }

        })

            .done(function (msg) {
                $("#form-show-rezome-data #fullname").html(msg['fullname']);
                $("#form-show-rezome-data #title").html(msg['title']);
                $("#form-show-rezome-data #email").html(msg['email']);
                $("#form-show-rezome-data #uni-state").html(msg['uni_state']);
                $("#form-show-rezome-data #uni-city").html(msg['uni_city']);
                $("#form-show-rezome-data #uni-address").html(msg['uni_address']);
                $("#form-show-rezome-data #home-state").html(msg['home_state']);
                $("#form-show-rezome-data #home-city").html(msg['home_city']);
                $("#form-show-rezome-data #home-address").html(msg['home_address']);
                $("#form-show-rezome-data #reshte").html(msg['reshte']);
                $("#form-show-rezome-data #grayesh").html(msg['grayesh']);
                $("#form-show-rezome-data #moadel").html(msg['moadel']);
                $("#form-show-rezome-data #sal").html(msg['sal']);


            })
    }


</script>