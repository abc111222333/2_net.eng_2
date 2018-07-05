<?php
if (isset($_SESSION['username'])) {
    header('Location: ' . "index.php?do=admin");
}

?>
<style>


</style>

<div class="col-sm-4 col-sm-offset-3" id="div-sign-in">


    <form id="form-login-data">
        <div class="form-group">
            <label for="username">نام کاربری</label>
            <input type="username" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">رمز:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>


    </form>

    <button onclick="login()" class="btn btn-default">ورود</button>

</div>

<script>


    function login(id) {

        var data = $("#form-login-data").serializeArray();
        data.push({'name': 'menu', 'value': 'do_login'});
        $.ajax({

            url: 'do-login.php',
            type: 'POST',
            async: false,
            data: data

        })

            .done(function (msg) {
                window.location.replace("index.php?do=admin");


            })
    }


</script>