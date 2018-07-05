<?php
session_start();
include 'public/config/db.php';
$db = new class_db();
?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.rtl.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <style>
        *, .col-sm-9, .col-sm-3, .col-sm-12, ul, li, div {
            padding: 0;
            margin: 0;

        }

        ul {
        }

        li {
            list-style: none;
        }

        .container {
            padding: 0;
        }

        #main-div {
            background: #999999;
            height: 900px;
        }

        .div-title {
            height: 50px;
            background: #429928;
        }

        .div-body {
            height: 300px;
            background: #507a99;
        }


    </style>


</head>
<body>


<div class="container" id="main-div">
    <div class="header" id="header"></div> <!--end header div-->
    <div class="content" id="content">

        <?php
        if (isset($_GET['do'])) {
            $do = $_GET['do'];
        } else {
            $do = "students";
        }

        switch ($do) {
            case "students":

                include 'stidents.php';;
                break;
            case "admin":

                include 'admin.php';;
                break;
            case "signin":

                include 'sign-in.php';;
                break;

            default:
                ;
        }


        ?>


    </div> <!-- end content div-->
    <div class="footer" id="footer"></div> <!--end footer div-->


</div>
<script>

</script>
</body>
</html>