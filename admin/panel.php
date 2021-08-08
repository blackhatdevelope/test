<?php
    session_start();
    if (! isset($_SESSION['auth']) || $_SESSION['is_admin'] == 0){
        $_SESSION['warning']='<div class="alert alert-danger">شما به اینجا دسترسی ندارید</div>';
        header('Location: ../index.php');
    }
 ?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پنل مدیریت</title>

    <link rel="stylesheet" href="../css/bootstrap_rtl.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/style-front.css">
</head>
<body>

<?php require 'static/header.php'?>



<script src="../js/popper.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.js"></script>

</body>
</html>
