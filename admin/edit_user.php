<?php
session_start();
if (! isset($_SESSION['auth']) || $_SESSION['is_admin'] == 0){
    $_SESSION['warning']='<div class="alert alert-danger">شما به اینجا دسترسی ندارید</div>';
    header('Location: ../index.php');
}

require '../database.php';

if ($_SERVER["REQUEST_METHOD"]=="GET"){
    $data=new DataBase();
    $user=$data->user($_GET['id']);
}


?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ویرایش اطلاعات کاربر</title>

    <link rel="stylesheet" href="../css/bootstrap_rtl.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/style-front.css">
</head>
<body>

<?php require 'static/header.php'?>


<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-10 m-auto">
            <div class="card">
                <h3 class="card-header">
                    ویرایش اطلاعات کاربر
                </h3>
                <div class="card-body">
                    <form dir="rtl" action="/admin/update_user.php" method="post">
                        <input type="hidden" name="id" value="<?=$user['id']?>">
                        <div class="form-group">
                            <label for="">نام</label>
                            <input type="text" name="full_name" value="<?=$user['full_name']?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">نام کاربری</label>
                            <input type="text" name="username" value="<?=$user['username']?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">ایمیل</label>
                            <input type="email" name="email" value="<?=$user['email']?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">فعال</label>
                            <select name="is_active" id=""  class="form-control">
                                <option value="1" <?php if($user['is_active']==1) echo 'selected' ?> >فعال</option>
                                <option value="0" <?php if($user['is_active']==0) echo 'selected' ?>>غیرفعال</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">ادمین</label>
                            <select name="is_admin" id=""  class="form-control">
                                <option value="1" <?php if($user['is_admin']==1) echo 'selected' ?>>ادمین</option>
                                <option value="0" <?php if($user['is_admin']==0) echo 'selected' ?>>کاربر عادی</option>
                            </select>
                        </div>
                        <div class="form-group m-auto mt-4">
                            <button class="btn btn-primary " type="submit">
                                <i class="fa fa-edit"></i>
                                ویرایش اطلاعات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.js"></script>
</body>
</html>


