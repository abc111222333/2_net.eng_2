<?php
if (!isset($_SESSION['username'])) {
    header('Location: ' . "index.php?do=signin");
}
$sql = "SELECT tbl_rezome.*,tbl_user.*
FROM tbl_user
INNER JOIN tbl_rezome on tbl_rezome.userid=tbl_user.id where tbl_user.type=2";
$array_students_rezome = $db->doSelect($sql, array());


?>
<style>
    #col-side-right {
        height: 300px;
        background: #429928;
        padding-right: 10px;
    }

    #col-side-right ul li a {
        font-size: 18px;
        color: white;
        cursor: pointer;
        text-decoration: none;

    }

    #col-side-right ul li {
        margin-top: 10px;

    }

    #col-side-left {
        height: 300px;
        background: #7a9899;
        padding-right: 10px;
    }
</style>


<div class="col-sm-12">
    <!-- Modal -->
    <div class="modal fade" id="add-user-Modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">افزودن کاربر</h4>
                </div>
                <div class="modal-body">


                    <form id="add-user-form">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">نام</label>
                                <input type="email" class="form-control" id="name" name="name" placeholder="نام کامل">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">نام کاربری</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                           placeholder="نام کاربری">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password"> رمز </label>
                                    <input type="password" class="form-control" id="password" name="password"
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
                    <button onclick="check_before_add_user()" class="btn btn-primary" data-dismiss="modal">ثبت</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن فرم</button>
                </div>
            </div>

        </div>
    </div>


    <div id="col-side-right" class="col-sm-3">
        <ul>
            <li><a data-toggle="modal" data-target="#add-user-Modal">افزود کاربر</a></li>
            <li><a onclick="load_student_list()">ویرایش کاربران</a></li>
            <li><a onclick="load_student_list_rezome()"> وبرایش رزومه</a></li>
            <li><a onclick="logout()">خروج از مدیریت</a></li>


        </ul>
    </div>
    <div id="col-side-left" class="col-sm-9">


    </div>


</div>


</div>


<script>
    function fetch_user(id) {
        var menu = "fetch_user";
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


                $("#edit-user-form #name").val(msg['fullname']);
                $("#edit-user-form #username").val(msg['username']);
                $("#edit-user-form #password").val(msg['password']);
                $("#edit-user-btn").attr('data-id', msg['id']);


            })
    }

    function delete_user(id) {
        var menu = "delete_user";
        var id = id;

        $.ajax({

            url: 'delete.php',
            type: 'POST',
            async: false,
            data: {
                menu: menu,
                id: id
            }

        })

            .done(function (msg) {

                switch (Number(msg)) {

                    case 1:
                        load_student_list();
                        alert("حدف شد");
                        break;

                    case 0:
                        alert("خطا در انجام عملیات");
                        break;
                    default:
                        alert("خطا در انجام عملیات");

                }


            })
    }


    function check_before_add_user() {
        var error=0;
    var username=$("#username").val();
    var name= $("#name").val();
    var password=$("#password").val();
    var rep_password=$("#rep-password").val();

    if(username==""){
        error=1;
        alert("لطفا نام کاربری  را وارد نمایید")
    }
        if(name==""){
            alert("لطفا نام و فامیل را وارد نمایید")
        error=1;
    }
        if(password==""){
            alert("لطفا یک رمز  وارد نمایید")
        error=1;
    }
      if(rep_password != password){
        alert("پسورد ها با هم مطابقت ندارند");
        error=1;
    }
if(error==0){
    add_user();
}

    }


    function add_user() {
        var data = $("#add-user-form").serializeArray();
        data.push({'name': 'menu', 'value': 'add_user'});
        $.ajax({

            url: 'add.php',
            type: 'POST',
            async: false,
            data: data

        })

            .done(function (msg) {

                switch (Number(msg)) {

                    case 1:
                        alert("افزوده شد");
                        break;

                    case 0:
                        alert("خطا در انجام عملیات");
                        break;
                    default:
                        alert("خطا در انجام عملیات");

                }


            })
    }

    function edit_user() {

        var id = $("#edit-user-btn").attr("data-id");
        var data = $("#edit-user-form").serializeArray();
        data.push({'name': 'menu', 'value': 'edit_user'});
        data.push({'name': 'id', 'value': id});
        $.ajax({

            url: 'edit.php',
            type: 'POST',
            async: false,
            data: data

        })

            .done(function (msg) {

                load_student_list();


            })
    }


    function load_student_list() {
        $.ajax({

            url: 'admin-student-list.php',
            type: 'POST',
            async: false,
            data: {}

        })

            .done(function (msg) {

                $("#col-side-left").html("");
                $("#col-side-left").append(msg);


            })
    }

    function load_student_list_rezome() {
        $.ajax({

            url: 'admin-student-list_rezome.php',
            type: 'POST',
            async: false,
            data: {}

        })

            .done(function (msg) {

                $("#col-side-left").html("");
                $("#col-side-left").append(msg);


            })
    }


    function fetch_rezome_data(id) {
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


                $("#form-edit-rezome #title").val(msg['title']);
                $("#form-edit-rezome #email").val(msg['email']);
                $("#form-edit-rezome #uni-state").val(msg['uni_state']);
                $("#form-edit-rezome #uni-city").val(msg['uni_city']);
                $("#form-edit-rezome #uni-address").val(msg['uni_address']);
                $("#form-edit-rezome #home-state").val(msg['home_state']);
                $("#form-edit-rezome #home-city").val(msg['home_city']);
                $("#form-edit-rezome #home-address").val(msg['home_address']);
                $("#form-edit-rezome #reshte").val(msg['reshte']);
                $("#form-edit-rezome #grayesh").val(msg['grayesh']);
                $("#form-edit-rezome #moadel").val(msg['moadel']);
                $("#form-edit-rezome #sal").val(msg['sal']);
                $("#edit-rezome-btn").attr('data-id', msg['id_r']);


            })
    }

    function edit_rezome() {
        var id = $("#edit-rezome-btn").attr("data-id");
        var data = $("#form-edit-rezome").serializeArray();
        data.push({'name': 'menu', 'value': 'edit_rezome'});
        data.push({'name': 'id', 'value': id});
        $.ajax({
            url: 'edit.php',
            type: 'POST',
            async: false,
            data: data

        })

            .done(function (msg) {

                switch (Number(msg)) {
                    case 1:

                        alert("ویرایش شد");
                        break;

                    case 0:
                        alert("خطا در انجام عملیات");
                        break;
                    default:
                        alert("خطا در انجام عملیات");

                }

            })
    }


    function logout() {

        $.ajax({

            url: 'do-login.php',
            type: 'POST',
            async: false,
            data: {
                menu: "do_logout",
            }

        })

            .done(function (msg) {

                window.location.replace("index.php?do=students");
            })
    }

</script>